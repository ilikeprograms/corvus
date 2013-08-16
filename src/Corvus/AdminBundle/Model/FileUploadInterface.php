<?php

// src/Corvus/AdminBundle/Model/FileUploadInterface.php
namespace Corvus\AdminBundle\Model;


interface FileUploadInterface
{
	public function getAbsolutePath();

    public function getWebPath();

    public function getUploadRootDir();

    public function getUploadDir();
}