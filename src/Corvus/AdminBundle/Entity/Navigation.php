<?php

// src/Corvus/AdminBundle/Entity/Navigation.php
namespace Corvus\AdminBundle\Entity;

use Corvus\AdminBundle\ILP\Entity\TableViewEntity;


/**
 * Corvus\AdminBundle\Entity\Navigation
 */
class Navigation extends TableViewEntity
{
    // Entity Name is needed to use Late static binding with TableViewEntity
    const ENTITY_NAME = 'navigation';

    
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $href
     */
    private $href;

    /**
     * @var string $title
     */
    private $title;

    /**
     * @var string $alt
     */
    private $alt;


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
     * Set href
     *
     * @param string $href
     */
    public function setHref($href)
    {
        $this->href = $href;
    }

    /**
     * Get href
     *
     * @return string 
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set alt
     *
     * @param string $alt
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;
    }

    /**
     * Get alt
     *
     * @return string 
     */
    public function getAlt()
    {
        return $this->alt;
    }
}