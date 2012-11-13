<?php

// src/Corvus/AdminBundle/Entity/WorkHistoryTableView.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class WorkHistoryTableView
{
    protected $workHistory;

    public function __construct()
    {
        $this->workHistory = new ArrayCollection();
    }

    public function getWorkHistory()
    {
        return $this->workHistory;
    }
}