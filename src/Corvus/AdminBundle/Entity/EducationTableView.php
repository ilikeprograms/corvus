<?php

// src/Corvus/AdminBundle/Entity/EducationTableView.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection,

    Corvus\CoreBundle\Entity\ITableView;


class EducationTableView implements ITableView
{
    const DATA_NAME = 'education';
    const TYPE_NAME = 'educationTableView';
    

    protected $_education;

    public function __construct()
    {
        $this->_education = new ArrayCollection();
    }

    public function getEducation()
    {
        return $this->_education;
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