<?php

// src/Corvus/CoreBundle/Extension/FileUploader.php

namespace Corvus\CoreBundle\Extension;

use Doctrine\ORM\Event\LifecycleEventArgs,
    Doctrine\ORM\Event\PreUpdateEventArgs,

    Corvus\AdminBundle\Entity\FileUpload,
    Corvus\AdminBundle\Entity\File;

/**
 * Allows single and multiple file uploads on persist and updated
 * File Entity is created for each upload and linked to an Entity if part
 * of an Entity persist/update.
 *
 * @author Thomas Coleman <tom@ilikeprograms.com>
 * @link http://ilikeprograms.com
 */
class FileUploader
{
    /**
     * Sets the Files fields before it is persisted to the database,
     * Can set Single Files or Multiple files if an Entity is persisted first
     * Once prepared Doctrine UnitOfWork is checked for changes
     * to make sure the changes here are saved when it is flushed.
     * 
     * Called on the prePersist doctrine event.
     *
     * @param \Doctrine\ORM\Event\LifecycleEventArgs $args
     * 
     * @return void
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        // If single File
        if ($entity instanceof File) {
            // Prepare the File for persisting
            $entity->setFileType($this->determineFileType($entity));
            $entity->setFilename($this->generateUniqueFilename($entity));
            $entity->setOriginalFilename($this->getOriginalFilename($entity));
        // If an Entity which supports File's
        } elseif ($entity instanceof FileUpload) {
            // Perpare multiple Files
            $this->prePersistFilePreparation($entity);
        } else {
            return;
        }
    }

    /**
     * Prepares all Files linked to an Entity before updating the Files and
     * persisting the changes to the database
     * Once prepared Doctrine UnitOfWork is checked for changes
     * to make sure the changes here are saved when it is flushed.
     * 
     * Called on the preUpdate doctrine event.
     *
     * @param \Doctrine\ORM\Event\PreUpdateEventArgs $args
     * 
     * @return void
     */
    public function preUpdate(PreUpdateEventArgs $args)
    {
        if (!($entity = $args->getEntity()) instanceof FileUpload) {
            return;
        }

        // Prepare multiple Files
        $this->prePersistFilePreparation($entity);
        
        // Recompute the change set for the Entity and Files. Makes sure the changes are saved properly
        $this->recomputeChangeSetForEntity($entity, $args->getEntityManager());
    }
    

    /**
     * Peforms the PostPreparation of all Files, with the now existing Entity details,
     * then Uploads all of the Files linked to the Entity.
     *
     * Called on the postPersist doctrine event.
     *
     * @param \Doctrine\ORM\Event\LifecycleEventArgs $args
     * 
     * @return void
     */
    public function postPersist(LifecycleEventArgs $args)
    {
        $this->postPersistUploadandChangeset($args);
    }


    /**
     * Peforms the PostPreparation of all Files, with the existing Entity details,
     * then Uploads all of the Files linked to the Entity.
     * 
     * Called on the postUpdate doctrine event
     *
     * @param \Doctrine\ORM\Event\LifecycleEventArgs $args
     * 
     * @return void
     */
    public function postUpdate(LifecycleEventArgs $args)
    {
        $this->postPersistUploadandChangeset($args);
    }

    /**
     * Removes all Files (including thumbnails) linked to an Entity
     * and also removes the File Entities.
     * 
     * Called on the preRemove doctrine event.
     *
     * @param \Doctrine\ORM\Event\LifecycleEventArgs $args
     * 
     * @return void
     */
    public function preRemove(LifecycleEventArgs $args)
    {
        if (!($entity = $args->getEntity()) instanceof FileUpload) {
            return;
        }
        
        // Find all the File Entities relating to this Entity
        $files = $args->getEntityManager()->getRepository('CorvusAdminBundle:' . $entity->getRepoName())
            ->findEntityFiles($entity->getId());

        /* @var $file \Corvus\AdminBundle\Entity\File */
        foreach ($files as $file) {
            // Get the file filename .ie.e filename
            $filename = $file->getFilename();
            
            // Path to file
            $symfonyFile = $entity->getUploadRootDir() . "/" . $filename;
            
            // If the file_type is an image, there may be a thumbnail to remove
            if ($file->getFileType() === 'image') {
               // Get the file extension
               $extension = substr($filename, strrpos($filename, '.'));
               // Appened _thumb to the file path, before the fie extension
               $thumbnail = str_replace($extension, "", $symfonyFile) . "_thumb" . $extension;
              
               if (file_exists($thumbnail)) {
                    unlink($thumbnail);         
               }
            }
            
            
            if (file_exists($symfonyFile)) {
                unlink($symfonyFile);
            }
            
            // Remove this File Entity
            $args->getEntityManager()->remove($file);
        }
        
        // Flush the Removals
        $args->getEntityManager()->flush();
        
    }
    
    /**
     * Performs the PostPreparation of all Files linked to an Entity,
     * then Uploads all of the Files
     * Once prepared Doctrine UnitOfWork is checked for changes
     * to make sure the changes here are saved when it is flushed.
     * 
     * @param \Doctrine\ORM\Event\LifecycleEventArgs $args
     * 
     * @return void
     */
    private function postPersistUploadandChangeset(LifecycleEventArgs $args)
    {
        if (!($entity = $args->getEntity()) instanceof FileUpload) {
            return;
        }

        if (count($entity->getFiles()) > 0) {
            // Upload all of the Files and create thumbnails if applicable
            $this->uploadMultipleFiles($entity);
        } else {
            return;
        }

        
        // Recompute the change set for the Entity and Files. Makes sure the changes are saved properly
        $this->recomputeChangeSetForEntity($entity, $args->getEntityManager());
    }
    
    /**
     * Performs the PrePersist preparation of multiple Files linked to an Entity.
     * 
     * @param \Corvus\AdminBundle\Entity\FileUpload $entity
     * 
     * @return void
     */
    private function prePersistFilePreparation($entity)
    {
        if (($files = $entity->getFiles()) !== null) {
            foreach ($files as $file) {
                if ($file->getFile()) {
                    $file->setUpdated(new \DateTime('now'));
                    $file->setFileType($this->determineFileType($file));
                    $file->setFilename($this->generateUniqueFilename($file));
                    $file->setOriginalFilename($this->getOriginalFilename($file));
                }
            }
        }
    }
    
    /**
     * Determins the File type of an File to be uploaded, checks if the File
     * matches a few image file types and marks as 'image' if so, else as 'file'.
     * 
     * @param \Corvus\AdminBundle\Entity\File $entity File to find the Filetype of.
     * 
     * @return string The filetype of the File to be uploaded.
     */
    private function determineFileType($entity)
    {
        // image file types
        $imageFileTypes = array('jpeg', 'jpg', 'png', 'gif');
        
        // Check the File type is an expected image type
        if (in_array($entity->getFile()->guessExtension(), $imageFileTypes)) {
            return 'image';
        } else {
            return 'file';
        }
    }

    /**
     * Creates a unique filename (including an extension) for a File.
     *
     * @param \Corvus\AdminBundle\Entity\File $entity File to create a filename for
     * 
     * @return string The unique filename of the File to be uploaded
     */
    private function generateUniqueFilename($entity)
    {
        if ($entity->getFilename() === null) {
            return uniqid() . '.' . $entity->getFile()->guessExtension();
        }

        return $entity->getFilename();
    }
    
    /**
     * Finds the original filename of a file and Sets the original filename fields.
     *
     * @param \Corvus\AdminBundle\Entity\File $entity File to find the original name of
     * 
     * @return string The original name of the File to be uploaded
     */
    private function getOriginalFilename($entity)
    {
        /* @var $symfonyFile \Symfony\Component\HttpFoundation\File */
        $symfonyFile = $entity->getFile();
        if ($entity->getOriginalFilename() !== $symfonyFile->getClientOriginalName()) {
            return $symfonyFile->getClientOriginalName();
        }

        return $entity->getOriginalFilename();
    }

    /**
     * Uploads multiple Files linked to an Entity.
     *
     * @param $entity The entity the files belong to
     * 
     * @return void
     */
    private function uploadMultipleFiles($entity)
    {
        if (($files = $entity->getFiles())) {
            /* @var $file \Corvus\AdminBundle\Entity\File */
            foreach ($files as $file) {
                $file->setEntityId($entity->getId());
                $file->setEntityName($entity->getRepoName());
                $file->setUpdated(new \DateTime('now'));

                if (($symfonyFile = $file->getFile()) !== null) {
                    $filename = $file->getFilename();
                    $symfonyFile->move($entity->getUploadRootDir(), $filename);
                    
                    if ($file->getFileType() === 'image') {
                        $this->createThumbnail($entity->getUploadRootDir() . "/" . $filename);
                    }
                }
            }
        }
    }

    /**
     * Creates and stores thumbnail images using the filename as the filename and extension.
     * 
     * @param string $filename The filename (including an extension).
     * 
     * @return void
     */
    private function createThumbnail($filename)
    {
        $imageProperties = getimagesize($filename);
        $originalImageWidth = $imageProperties[0];
        $originalImageHeight = $imageProperties[1];

        $extension = substr($filename, strrpos($filename, '.') + 1);

        if ($originalImageWidth > 250 || $originalImageHeight > 250) {
            $ratio = ($originalImageWidth / $originalImageHeight);

            $thumbnailImageWidth = 250;
            $thumbnailImageHeight = 250 / $ratio;
            $thumbnailImage = imagecreatetruecolor($thumbnailImageWidth, $thumbnailImageHeight);

            switch ($extension) {
                case "png":
                    $originalImage = imagecreatefrompng($filename);
                    $imageName = str_replace(".png", "", $filename) . "_thumb.png";
                    imagecopyresampled($thumbnailImage, $originalImage, 0, 0, 0, 0, $thumbnailImageWidth, $thumbnailImageHeight, $originalImageWidth, $originalImageHeight);
                    imagepng($thumbnailImage, $imageName);
                    break;
                case "jpg":
                    $originalImage = imagecreatefromjpeg($filename);
                    $imageName = str_replace(".jpg", "", $filename) . "_thumb.jpg";
                    imagecopyresampled($thumbnailImage, $originalImage, 0, 0, 0, 0, $thumbnailImageWidth, $thumbnailImageHeight, $originalImageWidth, $originalImageHeight);
                    imagejpeg($thumbnailImage, $imageName);
                    break;
                case "jpeg":
                    $originalImage = imagecreatefromjpeg($filename);
                    $imageName = str_replace(".jpeg", "", $filename) . "_thumb.jpeg";
                    imagecopyresampled($thumbnailImage, $originalImage, 0, 0, 0, 0, $thumbnailImageWidth, $thumbnailImageHeight, $originalImageWidth, $originalImageHeight);
                    imagejpeg($thumbnailImage, $imageName);
                    break;
                case "gif":
                    $originalImage = imagecreatefromgif($filename);
                    $imageName = str_replace(".gif", "", $filename) . "_thumb.gif";
                    imagecopyresampled($thumbnailImage, $originalImage, 0, 0, 0, 0, $thumbnailImageWidth, $thumbnailImageHeight, $originalImageWidth, $originalImageHeight);
                    imagegif($thumbnailImage, $imageName);
                    break;
            }
        }
    }
    
    /**
     * Uses the Doctrine UnitOfWork to check the FileUpload Entity for any changes during,
     * the FileUpload service process and recompute the change set, this makes sure that any
     * changes between the persist call and the FileUploader are saved correcttly,
     * also performs this for all Files linked to the Entity.
     * 
     * @param \Corvus\AdminBundle\Entity\FileUpload $entity The entity to check for changes
     * @param \Doctrine\ORM\EntityManager $em Doctrine Entity manager instance
     * 
     * @return void
     */
    private function recomputeChangeSetForEntity($entity, $em)
    {
        $em->getUnitOfWork()->recomputeSingleEntityChangeSet($em->getClassMetadata(get_class($entity)), $entity);
        
        if (($files = $entity->getFiles())) {
            foreach ($files as $file) {
                $em->getUnitOfWork()->recomputeSingleEntityChangeSet($em->getClassMetadata(get_class($file)), $file);
            }
        }
    }
}