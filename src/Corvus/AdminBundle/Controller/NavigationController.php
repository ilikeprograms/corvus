<?php

// src/Corvus/AdminBundle/Controller/NavigationController.php
namespace Corvus\AdminBundle\Controller;

use Corvus\AdminBundle\Entity\Navigation,
    Corvus\AdminBundle\Entity\NavigationTableView,
    Corvus\CoreBundle\Controller\TableViewController;


class NavigationController extends TableViewController
{
    public function __construct()
    {
        // Give the TableViewController parent the data it needs to construct the table view and methods
        parent::__construct(
            new Navigation(),
            'navigation',
            NavigationTableView::getDataName(),
            NavigationTableView::getTypeName()
        );
    }
}
