<?php

namespace Corvus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Corvus\AdminBundle\Entity\Navigation
 */
class Navigation
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $navigation_order
     */
    private $navigation_order;

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
     * Set navigation_order
     *
     * @param integer $navigationOrder
     */
    public function setNavigationOrder($navigationOrder)
    {
        $this->navigation_order = $navigationOrder;
    }

    /**
     * Get navigation_order
     *
     * @return integer 
     */
    public function getNavigationOrder()
    {
        return $this->navigation_order;
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