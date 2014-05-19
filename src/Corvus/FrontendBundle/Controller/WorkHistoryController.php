<?php

// src/Corvus/FrontendBundle/Controller/WorkHistoryController.php
namespace Corvus\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,

    Corvus\AdminBundle\Entity\WorkHistory;


class WorkHistoryController extends Controller
{
    public function findByIdAction(WorkHistory $workHistory)
    {
        $template_choice = $this->container->get('portfolioinforepository')->getTemplateChoice();

        return $this->render('CorvusFrontendBundle:'.$template_choice.':workHistoryId.html.twig', array(
            'workHistory' => $workHistory,
        ));
    }
}
