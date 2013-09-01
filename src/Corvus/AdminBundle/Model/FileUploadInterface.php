<?php

// src/Corvus/AdminBundle/Model/FileUploadInterface.php
namespace Corvus\AdminBundle\Model;

/**
 * Interface which defines two functions to help with finding the Upload path,
 * to be used in Conjunction with the FileUpload Entity to enforce conformance
 * with the way the FileUploader service works.
 */
interface FileUploadInterface
{
    public function getUploadRootDir();
    public function getUploadDir();
}