<?php

// src/Corvus/AdminBundle/Model/FileAccessorInterface.php
namespace Corvus\AdminBundle\Model;

/**
 * Interface which defines Accessor methods which handle getting/setting the Files,
 * linked to an Entity
 * to be used in Conjunction with the FileUpload Entity to enforce conformance
 * with the way the FileUploader service works.
 */
interface FileAccessorInterface
{
    public function getFiles();
    public function addFile(\Corvus\AdminBundle\Entity\File $file);
    public function removeFile(\Corvus\AdminBundle\Entity\File $file);
    public function removeAllFiles();
}
