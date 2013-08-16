<?php

// src/Corvus/AdminBundle/Controller/EducationController.php
namespace Corvus\AdminBundle\Controller;

use Corvus\AdminBundle\Entity\Education,
    Corvus\AdminBundle\Form\Type\EducationType,
    Corvus\AdminBundle\Entity\EducationTableView,
    Corvus\AdminBundle\ILP\Controller\TableViewController;

class EducationController extends TableViewController
{
    public function __construct()
    {
        // Give the TableViewController parent the data it needs to construct the table view and methods
        parent::__construct(
            new Education(),
            new EducationType(),
            EducationTableView::getDataName(),
            EducationTableView::getTypeName()
        );
    }
}
