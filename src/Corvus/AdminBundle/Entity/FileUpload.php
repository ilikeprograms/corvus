<?php

// src/Corvus/AdminBundle/Entity/FileUpload.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection,
    Corvus\AdminBundle\Model\FileUploadInterface,
    Corvus\AdminBundle\Model\FileAccessorInterface;

class FileUpload implements FileUploadInterface, FileAccessorInterface
{
    /**
     * @var ArrayCollection $files
     */
    protected $files;
    
    public function __construct()
    {
        $this->files = new ArrayCollection();
    }
    
    /**
     * Get the Directory location of the Default Uploads Directory
     */
    public function getUploadRootDir()
    {
        // the absolute directory path where uploaded files should be saved
        return __DIR__.'/../../../../web/' . FileUpload::getUploadDir();
    }

    /**
     * Get the Default Upload directory name.
     */
    public function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads';
    }
    
    /**
     * Get files
     * 
     * @return ArrayCollection
     */
    public function getFiles()
    {
        return $this->files;
    }
    
    /**
     * Add file
     *
     * @param Corvus\AdminBundle\Entity\File $file
     */
    public function addFile(\Corvus\AdminBundle\Entity\File $file)
    {
        $this->files[] = $file;
    }
    
    /**
     * Remove file
     *
     * @param Corvus\AdminBundle\Entity\File $file
     */
    public function removeFile(\Corvus\AdminBundle\Entity\File $file)
    {
        $this->files->remove($file);
    }
    
    /**
     * Clears the Files ArrayCollection
     */
    public function removeAllFiles()
    {
        $this->files->clear();
    }
}