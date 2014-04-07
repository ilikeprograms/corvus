<?php

// src/Corvus/FrontendBundle/Controller/DefaultController.php
namespace Corvus\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $template_choice = $this->container->get('portfolioinforepository')->getTemplateChoice();
        return $this->render('CorvusFrontendBundle:'.$template_choice.':home.html.twig');
    }

    public function educationAction()
    {
        $template_choice = $this->container->get('portfolioinforepository')->getTemplateChoice();
        $education = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:Education')
            ->findBy(array(), array('start_date' => 'DESC'));

        return $this->render('CorvusFrontendBundle:'.$template_choice.':education.html.twig', array(
            'education' => $education,
        ));
    }

    public function skillsAction()
    {
        $template_choice = $this->container->get('portfolioinforepository')->getTemplateChoice();
        $skills = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:Skills')
            ->FindAll();

        return $this->render('CorvusFrontendBundle:'.$template_choice.':skills.html.twig', array(
            'skills' => $skills,
        ));
    }

    public function aboutAction()
    {
        $template_choice = $this->container->get('portfolioinforepository')->getTemplateChoice();
    	$about = $this->getDoctrine()
			->getRepository('CorvusAdminBundle:About')
			->Find(1);

    	return $this->render('CorvusFrontendBundle:'.$template_choice.':about.html.twig', array(
    		'about' => $about,
    	));
    }

    public function workHistoryAction()
    {
        $template_choice = $this->container->get('portfolioinforepository')->getTemplateChoice();
        $workHistory = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:WorkHistory')
			->FindAll();

        return $this->render('CorvusFrontendBundle:'.$template_choice.':workHistory.html.twig', array(
            'workHistory' => $workHistory
        ));
    }
    
    public function projectHistoryAction()
    {
        $template_choice = $this->container->get('portfolioinforepository')->getTemplateChoice();
        $projectHistory = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:ProjectHistory')
			->FindAll();

        return $this->render('CorvusFrontendBundle:'.$template_choice.':projectHistory.html.twig', array(
            'projectHistory' => $projectHistory
        ));
    }
}
