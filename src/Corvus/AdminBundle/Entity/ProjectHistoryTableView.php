<?php

// src/Corvus/AdminBundle/Entity/ProjectHistoryTableView.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class ProjectHistoryTableView
{
    protected $projectHistory;

    public function __construct()
    {
        $this->projectHistory = new ArrayCollection();
    }

    public function getProjectHistory()
    {
        return $this->projectHistory;
    }
}