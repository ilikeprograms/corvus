<?php

// src/Corvus/AdminBundle/Controller/NavigationController.php
namespace Corvus\AdminBundle\Controller;

use Corvus\AdminBundle\Entity\Navigation,
    Corvus\AdminBundle\Form\Type\NavigationType,
    Corvus\AdminBundle\Entity\NavigationTableView,
    Corvus\AdminBundle\ILP\Controller\TableViewController;


class NavigationController extends TableViewController
{
    public function __construct()
    {
        // Give the TableViewController parent the data it needs to construct the table view and methods
        parent::__construct(
            new Navigation(),
            new NavigationType(),
            NavigationTableView::getDataName(),
            NavigationTableView::getTypeName()
        );
    }
}
