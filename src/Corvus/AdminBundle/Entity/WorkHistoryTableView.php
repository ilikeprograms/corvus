<?php

// src/Corvus/AdminBundle/Entity/WorkHistoryTableView.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection,

    Corvus\AdminBundle\ILP\Entity\ITableView;

class WorkHistoryTableView implements ITableView
{
    const DATA_NAME = 'workHistory';
    const TYPE_NAME = 'workHistoryTableView';
    
    
    protected $_workHistory;

    public function __construct()
    {
        $this->_workHistory = new ArrayCollection();
    }

    public function getWorkHistory()
    {
        return $this->_workHistory;
    }

    public static function getDataName() {
        return self::TYPE_NAME;
    }
    public static function getTypeName() {
        return self::DATA_NAME;
    }
}