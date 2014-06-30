<?php

// src/Corvus/FrontendBundle/Controller/ProjectHistory.php
namespace Corvus\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    
    Corvus\AdminBundle\Entity\ProjectHistory;


class ProjectHistoryController extends Controller
{
    public function findByIdAction(ProjectHistory $projectHistory)
    {
        $template_choice = $this->container->get('ilp_bootstrap_theme.theme_manager')->getTemplateChoice();

        return $this->render('CorvusFrontendBundle:'.$template_choice.':projectHistoryId.html.twig', array(
            'projectHistory' => $projectHistory
        ));
    }
}
