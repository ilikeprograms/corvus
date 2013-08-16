<?php

// src/Corvus/FrontendBundle/Controller/DefaultController.php
namespace Corvus\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Request,
    Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle,

    Corvus\AdminBundle\Entity\Contact,
    Corvus\AdminBundle\Form\Type\ContactType;


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

    public function aboutAction(Request $request)
    {
        $template_choice = $this->container->get('portfolioinforepository')->getTemplateChoice();
    	$em = $this->getDoctrine()->getEntityManager();
    	$about = $em->getRepository('CorvusAdminBundle:About')->Find(1);

        $defaultData = array('message' => 'Type your message here');
        $form = $this->createFormBuilder($defaultData)
        ->add('name', 'text')
        ->add('email', 'email')
        ->add('subject', 'text')
        ->add('message', 'textarea')
        ->getForm();

        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            $data = $form->getData();

            $message = \Swift_Message::newInstance()
                ->setSubject('Email from iLikePrograms.com')
                ->setFrom('tomc2k3@googlemail.com')
                ->setTo('tomc_2k3@hotmail.com')
                ->setBody($this->renderView('CorvusFrontendBundle:'.$template_choice.':contact.txt.twig', array('contact' => $data)));

            $this->get('mailer')->send($message);

            return $this->redirect($this->generateUrl('CorvusFrontendBundle_About'));
        }

    	return $this->render('CorvusFrontendBundle:'.$template_choice.':about.html.twig', array(
    		'about' => $about,
            'form' => $form->createView()
    	));
    }

    public function workHistoryAction()
    {
        $template_choice = $this->container->get('portfolioinforepository')->getTemplateChoice();
        $workHistory = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:WorkHistory')->FindAll();

        return $this->render('CorvusFrontendBundle:'.$template_choice.':workHistory.html.twig', array(
            'workHistory' => $workHistory
        ));
    }
    
    public function projectHistoryAction()
    {
        $template_choice = $this->container->get('portfolioinforepository')->getTemplateChoice();
        $projectHistory = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:ProjectHistory')->FindAll();

        return $this->render('CorvusFrontendBundle:'.$template_choice.':projectHistory.html.twig', array(
            'projectHistory' => $projectHistory
        ));
    }
}
