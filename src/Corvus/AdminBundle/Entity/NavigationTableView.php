<?php

// src/Corvus/AdminBundle/Entity/NavigationTableView.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection,
    
    Corvus\AdminBundle\ILP\Entity\ITableView;

class NavigationTableView implements ITableView
{
    const DATA_NAME = 'navItems';
    const TYPE_NAME = 'navigationTableView';
    

    protected $_navItems;

    public function __construct()
    {
        $this->_navItems = new ArrayCollection();
    }

    public function getNavItems()
    {
        return $this->_navItems;
    }

    public static function getDataName()
    {
        return self::DATA_NAME;
    }

    public static function getTypeName()
    {
        return self::TYPE_NAME;
    }
}