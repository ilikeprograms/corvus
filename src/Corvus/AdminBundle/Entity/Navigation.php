<?php

// src/Corvus/AdminBundle/Entity/Navigation.php
namespace Corvus\AdminBundle\Entity;

use Corvus\AdminBundle\ILP\Entity\ITableViewEntity;

/**
 * Corvus\AdminBundle\Entity\Navigation
 */
class Navigation implements ITableViewEntity
{
    const ENTITY_NAME = 'navigation';

    
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $row_order
     */
    private $row_order;

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
     * Set row_order
     *
     * @param integer $rowOrder
     */
    public function setRowOrder($rowOrder)
    {
        $this->row_order = $rowOrder;
    }

    /**
     * Get row_order
     *
     * @return integer 
     */
    public function getRowOrder()
    {
        return $this->row_order;
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

    public static function getName()
    {
        return self::ENTITY_NAME;
    }

    public static function getRepoName()
    {
        return ucfirst(self::ENTITY_NAME);
    }
}