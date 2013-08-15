<?php

namespace Corvus\AdminBundle\Controller;

use Corvus\AdminBundle\Entity\Skills,
    Corvus\AdminBundle\Form\Type\SkillsType,
    Corvus\AdminBundle\Entity\SkillsTableView,
    Corvus\AdminBundle\ILP\Controller\TableViewController;

class SkillsController extends TableViewController
{
    public function __construct()
    {
        // Give the TableViewController parent the data it needs to construct the table view and methods
        parent::__construct(
            new Skills(),
            new SkillsType(),
            SkillsTableView::getDataName(),
            SkillsTableView::getTypeName()
        );
    }
}