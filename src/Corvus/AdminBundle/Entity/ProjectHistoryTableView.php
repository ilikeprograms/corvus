<?php

// src/Corvus/AdminBundle/Entity/ProjectHistoryTableView.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection,

    Corvus\CoreBundle\Entity\ITableView;


class ProjectHistoryTableView implements ITableView
{
    const DATA_NAME = 'projectHistory';
    const TYPE_NAME = 'projectHistoryTableView';
    
    
    protected $_projectHistory;

    public function __construct()
    {
        $this->_projectHistory = new ArrayCollection();
    }

    public function getProjectHistory()
    {
        return $this->_projectHistory;
    }
    
    public static function getDataName() {
        return self::DATA_NAME;
    }
    
    public static function getTypeName() {
        return self::TYPE_NAME;
    }
}