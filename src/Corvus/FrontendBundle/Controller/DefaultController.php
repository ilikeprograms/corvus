<?php

// src/Corvus/FrontendBundle/Controller/DefaultController.php
namespace Corvus\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Template
     */
    public function indexAction()
    {
        return array();
    }

    /**
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
