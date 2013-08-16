<?php

// src/Corvus/AdminBundle/Extension/FileUploader.php
namespace Corvus\AdminBundle\Extension;

use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Corvus\AdminBundle\Entity\FileUpload;
use Corvus\AdminBundle\Entity\Image;

/**
 * FileUploader service
 *
 * Allows single and multiple file uploads.
 * Each file can be updated and files are removed with the entity
 *
 * @author Thomas Coleman <tom@ilikeprograms.com>
 */
class FileUploader
{ 
    /**
     * Called on the prePersist doctrine event
     *
     * Sets filename(s) of the file(s)
     *
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        if($entity instanceof Image) {
            $entity->path = $this->setFilename($entity->ProjectHistory->getUploadRootDir(), $entity->path, $entity->file);
        }
        if($entity instanceof FileUpload)
        {
            if(count($entity->images) > 0)
            {
                if($entity->images->count() > 1) {
                    $this->setMultipleFilenames($entity);
                } else {
                    $entity->images[0]->path = $this->setFilename($entity->getUploadRootDir(), $entity->images[0]->path, $entity->images[0]->file);
                }
            }
        }
        else
        {
            return;
        }
    }

    /**
     * Called on the preUpdate doctrine event
     *
     * Sets filename(s) of the file(s)
     *
     * @param PreUpdateEventArgs $args
     */
    public function preUpdate(PreUpdateEventArgs $args)
    {
        if(!($entity = $args->getEntity()) instanceof FileUpload)
        {
            return;
        }

        if(count($entity->images) > 0)
        {
            $entity->images->count() > 1 ? $this->setMultipleFilenames($entity) : $this->setFilename($entity->getUploadRootDir(), $entity->images[0]->path, $entity->images[0]->file);
        }

        $em = $args->getEntityManager();
        $em->getUnitOfWork()->recomputeSingleEntityChangeSet($em->getClassMetadata(get_class($entity)), $entity);
    }

    /**
     * Called on the postPersist doctrine event
     *
     * Uploads the file(s) to the upload directory
     *
     * @param LifecycleEventArgs $args
     */
    public function postPersist(LifecycleEventArgs $args)
    {
    	if(!($entity = $args->getEntity()) instanceof FileUpload)
    	{
    		return;
    	}

        if (null === $entity->images) {
        	return;
        }

        if(count($entity->images) > 0)
        {
            if($entity->images->count() > 1) {
                $entity->images = $this->uploadMultipleFiles($entity);
            } else {
                var_dump($entity->images[0]->path);
                $this->uploadFile($entity, $entity->images[0]->file, $entity->images[0]->path);
            }
        }
    }

    /**
     * Called on the postUpdate doctrine event
     *
     * Uploads the file(s) to the upload directory
     *
     * @param LifecycleEventArgs $args
     */
    public function postUpdate(LifecycleEventArgs $args)
    {
    	if(!($entity = $args->getEntity()) instanceof FileUpload)
    	{
    		return;
    	}

        if (null === $entity->images) {
        	return;
        }

        if(count($entity->images) > 0)
        {
            $entity->images->count() > 1 ? $this->uploadMultipleFiles($entity) : $this->uploadFile($entity, $entity->images[0]->file, $entity->images[0]->path);
        }
    }

    /**
     * Called on the postRemove doctrine event
     *
     * Removes the file(s)
     *
     * @param LifecycleEventArgs $args
     */
    public function postRemove(LifecycleEventArgs $args)
    {
        if(!($entity = $args->getEntity()) instanceof FileUpload)
        {
            return;
        }

        $this->removeFiles($entity);
    }

    /**
     * Creates a unique filename
     *
     * @param $entity The entity which the file belongs to
     */
    private function setFilename($uploadDir, $path, $file)
    {
        if($path == null)
        {
            return $path = uniqid().'.'.$file->guessExtension();
        }
        else
        {
            return $path;
        }
    }

    /**
     * Creates unique filenames for each file
     *
     * @param $entity The entity the files belong to
     */
    private function setMultipleFilenames($entity)
    {
        foreach ($entity->images as $image) {
            if($image->file)
            {
                if($image->path == null)
                {
                    $image->updated = new \DateTime('now');
                    $image->path = uniqid().'.'.$image->file->guessExtension();
                }
            }
        }
    }

    /**
     * Uploads the file and names it using the filename
     *
     * @param $entity The entity the file belong to
     */
    private function uploadFile($entity, $file, $path)
    {
        if($file)
        {
            $entity->images[0]->file->move($entity->getUploadRootDir(), $entity->images[0]->path);
            $this->createThumbnail($entity->getUploadRootDir()."/".$path);
        }
    }

    /**
     * Uploads the files and names them using the filenames
     *
     * @param $entity The entity the files belong to
     */
    private function uploadMultipleFiles($entity)
    {
        foreach ($entity->images as $image) {
            if($image->file)
            {
                $image->file->move($entity->getUploadRootDir(), $image->path);
                $this->createThumbnail($entity->getUploadRootDir()."/".$image->path);
            }
        }      
    }

    private function createThumbnail($path)
    {
        $imageProperties = getimagesize($path);
        $originalImageWidth = $imageProperties[0];
        $originalImageHeight = $imageProperties[1];
        $imageType = $imageProperties[2];

        $extension = substr($path, strrpos($path, '.' ) +1);

        if($originalImageWidth > 250 || $originalImageHeight > 250)
        {
            $ratio = ($originalImageWidth / $originalImageHeight);

            $thumbnailImageWidth = 250;
            $thumbnailImageHeight = 250 / $ratio;
            $thumbnailImage = imagecreatetruecolor($thumbnailImageWidth, $thumbnailImageHeight);

            switch($extension) {
            case "png":
                $originalImage = imagecreatefrompng($path);
                $imageName = str_replace(".png", "", $path)."_thumb.png";
                imagecopyresampled($thumbnailImage, $originalImage, 0, 0, 0, 0, $thumbnailImageWidth, $thumbnailImageHeight, $originalImageWidth, $originalImageHeight);
                imagepng($thumbnailImage, $imageName);
                break;
            case "jpg":
                $originalImage = imagecreatefromjpeg($path);
                $imageName = str_replace(".jpg", "", $path)."_thumb.jpg";
                imagecopyresampled($thumbnailImage, $originalImage, 0, 0, 0, 0, $thumbnailImageWidth, $thumbnailImageHeight, $originalImageWidth, $originalImageHeight);
                imagejpeg($thumbnailImage, $imageName);
                break;
            case "jpeg":
                $originalImage = imagecreatefromjpeg($path);
                $imageName = str_replace(".jpeg", "", $path)."_thumb.jpeg";
                imagecopyresampled($thumbnailImage, $originalImage, 0, 0, 0, 0, $thumbnailImageWidth, $thumbnailImageHeight, $originalImageWidth, $originalImageHeight);
                imagejpeg($thumbnailImage, $imageName);
                break;
            case "gif":
                $originalImage = imagecreatefromgif($path);
                $imageName = str_replace(".gif", "", $path)."_thumb.gif";
                imagecopyresampled($thumbnailImage, $originalImage, 0, 0, 0, 0, $thumbnailImageWidth, $thumbnailImageHeight, $originalImageWidth, $originalImageHeight);
                imagegif($thumbnailImage, $imageName);
                break;
            }
        }
    }

    /**
     * Removes the files associated with the entity
     *
     * @param $entity The entity the files belong to
     */
    private function removeFiles($entity)
    {
        if(!$entity instanceof FileUpload)
        {
            return;
        }

        foreach ($entity->images as $image) {
            $path = $image->getPath();
            $extension = substr($path, strrpos($path, '.' ));

            $file = $entity->getUploadRootDir()."/".$path;
            $thumbnail = str_replace($extension, "", $file)."_thumb".$extension;
            
            if(file_exists($file))
            {
                unlink($file);
                unlink($thumbnail);
            }
        }
    }
}