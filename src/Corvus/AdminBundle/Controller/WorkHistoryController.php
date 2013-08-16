<?php

// src/Corvus/AdminBundle/Controller/WorkHistoryController.php
namespace Corvus\AdminBundle\Controller;

use Corvus\AdminBundle\Entity\WorkHistory,
    Corvus\AdminBundle\Form\Type\WorkHistoryType,
    Corvus\AdminBundle\Entity\WorkHistoryTableView,
    Corvus\AdminBundle\ILP\Controller\TableViewController;


class WorkHistoryController extends TableViewController
{
    public function __construct()
    {
        // Give the TableViewController parent the data it needs to construct the table view and methods
        parent::__construct(
            new WorkHistory(),
            new WorkHistoryType(),
            WorkHistoryTableView::getDataName(),
            WorkHistoryTableView::getTypeName()
        );
    }
}