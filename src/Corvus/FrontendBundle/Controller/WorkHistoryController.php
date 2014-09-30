<?php

// src/Corvus/FrontendBundle/Controller/WorkHistoryController.php
namespace Corvus\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,

    Corvus\AdminBundle\Entity\WorkHistory;


class WorkHistoryController extends Controller
{
    public function findByIdAction(WorkHistory $workHistory)
    {
        $template_choice = $this->container->get('ilp_bootstrap_theme.theme_manager')->getTemplateChoice();

        $securityContext = $this->container->get('security.context');
        if (!$securityContext->isGranted('IS_AUTHENTICATED_FULLY')) {
            if (!$workHistory->getIsPublished()) {
                throw $this->createNotFoundException('The Work History Record you are looking for was not found.');
            }
        }

        return $this->render('CorvusFrontendBundle:'.$template_choice.':workHistoryId.html.twig', array(
            'workHistory' => $workHistory,
        ));
    }
}
