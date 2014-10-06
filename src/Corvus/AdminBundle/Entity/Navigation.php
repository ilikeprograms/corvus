<?php

// src/Corvus/AdminBundle/Entity/Navigation.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM,

    Symfony\Component\Validator\Constraints as Assert,

    Corvus\CoreBundle\Entity\TableViewEntity;


/**
 * Corvus\AdminBundle\Entity\Navigation
 * 
 * @ORM\Entity(repositoryClass="Corvus\AdminBundle\Entity\NavigationRepository")
 * @ORM\Table
 */
class Navigation extends TableViewEntity
{
    // Entity Name is needed to use Late static binding with TableViewEntity
    const ENTITY_NAME   = 'Navigation';
    const ROUTE_STEM    = 'navigation';

    
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * 
     * @Assert\NotNull()
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $href;

    /**
     * @ORM\Column(type="string")
     * 
     * @Assert\NotNull()
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     * 
     * @Assert\NotNull()
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
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