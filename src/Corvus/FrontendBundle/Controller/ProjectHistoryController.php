<?php

// src/Corvus/FrontendBundle/Controller/ProjectHistory.php
namespace Corvus\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,

    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter,
    
    Corvus\AdminBundle\Entity\ProjectHistory;

/**
 * @Route("/project-history")
 */
class ProjectHistoryController extends Controller
{    
    /**
     * @Route("/id/{id}", name="frontend_project_history_id", requirements={"id": "\d+"})
     * @Method({"GET"})
     */
    public function findByIdAction(ProjectHistory $projectHistory)
    {
        return $this->renderProjectHistory($projectHistory);
    }

    /**
     * @Route("/{slug}", name="frontend_project_history_slug")
     * @Method({"GET"})
     * 
     * @ParamConverter("projectHistory", class="CorvusAdminBundle:ProjectHistory")
     */
    public function findBySlugAction(ProjectHistory $projectHistory)
    {
        return $this->renderProjectHistory($projectHistory);
    }

    public function renderProjectHistory(ProjectHistory $projectHistory)
    {
        $template_choice = $this->container->get('ilp_bootstrap_theme.theme_manager')->getTemplateChoice();

        $securityContext = $this->container->get('security.context');
        if (!$securityContext->isGranted('IS_AUTHENTICATED_FULLY')) {
            if (!$projectHistory->getIsPublished()) {
                throw $this->createNotFoundException('The Project Record you are looking for was not found.');
            }
        }

        return $this->render('CorvusFrontendBundle:'.$template_choice.':projectHistoryId.html.twig', array(
            'projectHistory' => $projectHistory
        ));
    }
}
