<?php

// src/Corvus/AdminBundle/Entity/SkillTableView.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection,

    Corvus\CoreBundle\Entity\ITableView;


class SkillsTableView implements ITableView
{
    const DATA_NAME = 'skills';
    const TYPE_NAME = 'skillsTableView';
    
    
    protected $_skills;

    public function __construct()
    {
        $this->_skills = new ArrayCollection();
    }

    public function getSkills()
    {
        return $this->_skills;
    }
    
    public static function getDataName() {
        return self::DATA_NAME;
    }
    
    public static function getTypeName() {
        return self::TYPE_NAME;
    }
}