<?php

// src/Corvus/AdminBundle/Controller/GeneralSettingsController.php
namespace Corvus\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request,
    Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,

    Corvus\AdminBundle\Entity\GeneralSettings,

    Corvus\AdminBundle\Form\Type\GeneralSettingsType,
    Corvus\AdminBundle\Form\Type\ChangePasswordType,
    Corvus\AdminBundle\Form\Type\AnalyticsType;

/**
 * @Route("/general-settings")
 */
class GeneralSettingsController extends Controller
{
    /**
     * @Route("/", name="admin_general_settings")
     * @Method({"GET", "POST"})
     * 
     * @Template
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function generalSettingsAction(Request $request)
    {
        $generalSettings = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:GeneralSettings')
            ->Find(1);

        if($generalSettings == null) {
            $generalSettings = new GeneralSettings();
        }

        $form = $this->createForm(new GeneralSettingsType(), $generalSettings);

        $form->handleRequest($request);

        if($form->isValid()) {
            $logo = $form['logo']->getData();
            
            if ($logo) {
                $filepath = 'logo.' . $logo->guessExtension();
                $logo->move('uploads', $filepath);
                $generalSettings->setPath($filepath);
            }

            $em = $this->getDoctrine()->getManager();

            $em->persist($generalSettings);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'General Settings have been saved.');
            return $this->redirect($this->generateUrl('CorvusAdminBundle_GeneralSettings'));
        } else {
            if ($form->isSubmitted()) {
                $this->get('session')->getFlashBag()->add('notice', 'Please correct the errors to continue!');
            }
        }

        return array(
            'form' => $form->createView(),
        );
    }
    
    /**
     * @Route("/security", name="admin_general_settings_security")
     * @Method({"GET", "POST"})
     * 
     * @Template
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function securityAction(Request $request)
    {
        $securityContext = $this->container->get('security.context');
        $user  = $securityContext->getToken()->getUser();

        $form = $this->createForm(new ChangePasswordType(), $user);

        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $encoder = $this->container
                ->get('security.encoder_factory')
                ->getEncoder($user);
            $user->setPassword($encoder->encodePassword($user->getPlainPassword(), $user->getSalt()));
            $user->setPlainPassword('');

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add('notice', 'New password has been Set!');
            return $this->redirect($this->generateUrl('CorvusAdminBundle_Security'));
        } else {
            if ($form->isSubmitted()) {
                $this->get('session')->getFlashBag()->add('notice', 'Please correct the errors to continue!');
            }
        }

        return array(
            'form' => $form->createView()
        );
    }
    
    /**
     * @Route("/analytics", name="admin_general_settings_analytics")
     * @Method({"GET", "POST"})
     * 
     * @Template
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function analyticsAction(Request $request)
    {
        $analytics = $this->getDoctrine()->getRepository('CorvusAdminBundle:GeneralSettings')->Find(1);
        
        $form = $this->createForm(new AnalyticsType(), $analytics);
        
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($analytics);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'The Analytics has been Updated!');
            return $this->redirect($this->generateUrl('CorvusAdminBundle_Analytics'));
        } else {
            if ($form->isSubmitted()) {
                $this->get('session')->getFlashBag()->add('notice', 'Please correct the errors to continue!');
            }
        }

        return array(
            'form' => $form->createView()
        );
    }
}