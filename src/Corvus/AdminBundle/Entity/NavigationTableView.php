<?php

// src/Corvus/AdminBundle/Entity/NavigationTableView.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class NavigationTableView
{
    protected $navItems;

    public function __construct()
    {
        $this->navItems = new ArrayCollection();
    }

    public function getNavItems()
    {
        return $this->navItems;
    }
}