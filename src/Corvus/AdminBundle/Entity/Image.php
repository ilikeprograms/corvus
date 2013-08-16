<?php

// src/Corvus/AdminBundle/Entity/Image.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Corvus\AdminBundle\Entity\Image
 */
class Image
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $image_title
     */
    private $image_title;

    /**
     * @var string $path
     */
    public $path;

    /**
     * @var string $file
     */
    public $file;

    /**
     * @var string $description
     */
    private $description;

    /**
     * @var datetime $updated
     */
    public $updated;

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
     * Set image_title
     *
     * @param string $imageTitle
     */
    public function setImageTitle($imageTitle)
    {
        $this->image_title = $imageTitle;
    }

    /**
     * Get image_title
     *
     * @return string 
     */
    public function getImageTitle()
    {
        return $this->image_title;
    }

    /**
     * Set path
     *
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
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
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * @var Corvus\AdminBundle\Entity\ProjectHistory
     */
    public $ProjectHistory;


    /**
     * Set ProjectHistory
     *
     * @param Corvus\AdminBundle\Entity\ProjectHistory $projectHistory
     */
    public function setProjectHistory(\Corvus\AdminBundle\Entity\ProjectHistory $projectHistory)
    {
        $this->ProjectHistory = $projectHistory;
    }

    /**
     * Get ProjectHistory
     *
     * @return Corvus\AdminBundle\Entity\ProjectHistory 
     */
    public function getProjectHistory()
    {
        return $this->ProjectHistory;
    }
}