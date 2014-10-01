<?php

// src/Corvus/FrontendBundle/Controller/DefaultController.php
namespace Corvus\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="frontend_homepage")
     * @Method({"GET"})
     * 
     * @Template
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/education", name="frontend_education")
     * @Method({"GET"})
     * 
     * @Template
     */
    public function educationAction()
    {
        $education = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:Education')
            ->findBy(array(), array('start_date' => 'DESC'));

        return array(
            'education' => $education,
        );
    }

    /**
     * @Route("/skills", name="frontend_skills")
     * @Method({"GET"})
     * 
     * @Template
     */
    public function skillsAction()
    {
        $skills = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:Skills')
            ->FindAll();

        return array(
            'skills' => $skills,
        );
    }

    /**
     * @Route("/about", name="frontend_about")
     * @Method({"GET"})
     * 
     * @Template
     */
    public function aboutAction()
    {
    	$about = $this->getDoctrine()
			->getRepository('CorvusAdminBundle:About')
			->Find(1);

    	return array(
    		'about' => $about,
    	);
    }

    /**
     * @Route("/work-history", name="frontend_work_history")
     * @Method({"GET"})
     * 
     * @Template
     */
    public function workHistoryAction()
    {
        $workHistory = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:WorkHistory')
			->FindAll();

        return array(
            'workHistory' => $workHistory
        );
    }
    
    /**
     * @Route("/project-history", name="frontend_project_history")
     * @Method({"GET"})
     * 
     * @Template
     */
    public function projectHistoryAction()
    {
        $projectHistory = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:ProjectHistory')
			->FindAll();

        return array(
            'projectHistory' => $projectHistory
        );
    }
}