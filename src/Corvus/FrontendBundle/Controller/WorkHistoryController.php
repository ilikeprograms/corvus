<?php

// src/Corvus/FrontendBundle/Controller/WorkHistoryController.php
namespace Corvus\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter,

    Corvus\AdminBundle\Entity\WorkHistory;

/**
 * @Route("/work-history")
 */
class WorkHistoryController extends Controller
{
    /**
     * @Route("/id/{id}", name="frontend_work_history_id", requirements={"id": "\d+"})
     * @Method({"GET"})
     */
    public function findByIdAction(WorkHistory $workHistory)
    {
        return $this->renderWorkHistory($workHistory);
    }

    /**
     * @Route("/{slug}", name="frontend_work_history_slug")
     * @Method({"GET"})
     * 
     * @ParamConverter("workHistory", class="CorvusAdminBundle:WorkHistory")
     */
    public function findBySlugAction(WorkHistory $workHistory)
    {
        return $this->renderWorkHistory($workHistory);
    }
    
    private function renderWorkHistory(WorkHistory $workHistory)
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
