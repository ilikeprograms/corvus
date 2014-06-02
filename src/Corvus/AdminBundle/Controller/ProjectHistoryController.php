<?php

// src/Corvus/AdminBundle/Controller/ProjectHistoryController.php
namespace Corvus\AdminBundle\Controller;

use Corvus\AdminBundle\Entity\ProjectHistory,
    Corvus\AdminBundle\Form\Type\ProjectHistoryType,
    Corvus\AdminBundle\Entity\ProjectHistoryTableView,
    Corvus\CoreBundle\Controller\TableViewController;


class ProjectHistoryController extends TableViewController
{
    public function __construct()
    {
        // Give the TableViewController parent the data it needs to construct the table view and methods
        parent::__construct(
            new ProjectHistory(),
            new ProjectHistoryType(),
            ProjectHistoryTableView::getDataName(),
            ProjectHistoryTableView::getTypeName()
        );
    }
}