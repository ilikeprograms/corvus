<?php

namespace Corvus\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle;
use Corvus\AdminBundle\Entity\Contact;
use Corvus\AdminBundle\Form\Type\ContactType;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CorvusFrontendBundle:Default:home.html.twig');
    }

    public function educationAction()
    {
        $education = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:Education')
            ->findBy(array(), array('start_date' => 'DESC'));

        return $this->render('CorvusFrontendBundle:Default:education.html.twig', array(
            'education' => $education,
        ));
    }

    public function skillsAction()
    {
        $skills = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:Skills')
            ->FindAll();

        return $this->render('CorvusFrontendBundle:Default:skills.html.twig', array(
            'skills' => $skills,
        ));
    }

    public function aboutAction(Request $request)
    {
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
                ->setBody($this->renderView('CorvusFrontendBundle:Default:contact.txt.twig', array('contact' => $data)));

            $this->get('mailer')->send($message);

            return $this->redirect($this->generateUrl('CorvusFrontendBundle_About'));
        }

    	return $this->render('CorvusFrontendBundle:Default:about.html.twig', array(
    		'about' => $about,
            'form' => $form->createView()
    	));
    }

    public function workHistoryAction()
    {
        $workHistory = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:WorkHistory')->FindAll();

        return $this->render('CorvusFrontendBundle:Default:workHistory.html.twig', array(
            'workHistory' => $workHistory
        ));
    }
    
    public function projectHistoryAction()
    {
        $projectHistory = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:ProjectHistory')->FindAll();

        return $this->render('CorvusFrontendBundle:Default:projectHistory.html.twig', array(
            'projectHistory' => $projectHistory
        ));
    }
}
