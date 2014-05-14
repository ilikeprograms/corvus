<?php

// src/Corvus/AdminBundle/Entity/File.php
namespace Corvus\AdminBundle\Entity;


/**
 * Corvus\AdminBundle\Entity\File
 */
class File
{
    /**
     * @var integer $id
     */
    private $id;
    
    /**
     * @var string $original_filename
     */
    private $original_filename;
    
    /**
     * @var string $file_type
     */
    private $file_type;

    /**
     * @var string $file_title
     */
    private $file_title;
    
    /**
     * @var integer $entity_id
     */
    private $entity_id;
    
    /**
     * @var string $entity_name
     */
    private $entity_name;

    /**
     * @var string $description
     */
    private $description;
    
    /**
     * @var string $filename
     */
    private $filename;

    /**
     * @var string $file
     */
    private $file;

    /**
     * @var datetime $updated
     */
    private $updated;

    public function __construct()
    {
        $this->updated = new \DateTime('now');
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set original_filename
     *
     * @param string $originalFilename
     */
    public function setOriginalFilename($originalFilename)
    {
        $this->original_filename = $originalFilename;
    }

    /**
     * Get original_filename
     *
     * @return string
     */
    public function getOriginalFilename()
    {
        return $this->original_filename;
    }
    
    /**
     * Set filename
     *
     * @param string $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * Get filename
     *
     * @return string 
     */
    public function getFilename()
    {
        return $this->filename;
    }
    
    /**
     * Set file_type
     *
     * @param string $fileType
     */
    public function setFileType($fileType)
    {
        $this->file_type = $fileType;
    }

    /**
     * Get file_type
     *
     * @return string
     */
    public function getFileType()
    {
        return $this->file_type;
    }
    
    /**
     * Set file_title
     *
     * @param string $fileTitle
     */
    public function setFileTitle($fileTitle)
    {
        $this->file_title = $fileTitle;
    }

    /**
     * Get file_title
     *
     * @return string 
     */
    public function getFileTitle()
    {
        return $this->file_title;
    }
    
    /**
     * Set entity_id
     *
     * @param string $entityId
     */
    public function setEntityId($entityId)
    {
        $this->entity_id = $entityId;
    }

    /**
     * Get entity_id
     *
     * @return string 
     */
    public function getEntityId()
    {
        return $this->entity_id;
    }
    
    /**
     * Set entity_name
     *
     * @param string $entityName
     */
    public function setEntityName($entityName)
    {
        $this->entity_name = $entityName;
    }

    /**
     * Get entity_name
     *
     * @return string 
     */
    public function getEntityName()
    {
        return $this->entity_name;
    }

    /**
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    /**
     * Set file
     *
     * @param string $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Set updated
     *
     * @param string $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * Get updated
     *
     * @return string 
     */
    public function getUpdated()
    {
        return $this->updated;
    }
}