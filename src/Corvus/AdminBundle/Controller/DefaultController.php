<?php

// src/Corvus/AdminBundle/Controller/DefaultController.php
namespace Corvus\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request,
    Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,

    Corvus\AdminBundle\Entity\EducationTableView,
    Corvus\AdminBundle\Entity\ProjectHistoryTableView,
    Corvus\AdminBundle\Entity\WorkHistoryTableView,
    Corvus\AdminBundle\Entity\SkillsTableView,
    Corvus\AdminBundle\Entity\NavigationTableView,
    Corvus\AdminBundle\Entity\About,

    Corvus\AdminBundle\Form\Type\EducationTableViewType,
    Corvus\AdminBundle\Form\Type\ProjectHistoryTableViewType,
    Corvus\AdminBundle\Form\Type\WorkHistoryTableViewType,
    Corvus\AdminBundle\Form\Type\SkillsTableViewType,
    Corvus\AdminBundle\Form\Type\NavigationTableViewType,
    Corvus\AdminBundle\Form\Type\AboutType;


class DefaultController extends Controller
{
    /**
     * @Template
     */
    public function indexAction()
    {
        return $this->render('CorvusAdminBundle:Default:index.html.twig');
    }

    /**
     * @Template
     */
    public function siteDesignAction()
    {
        return $this->render('CorvusAdminBundle:Default:siteDesign.html.twig');
    }

    /**
     * @Template
     */
    public function educationAction()
    {
        $educationTableView = new EducationTableView();

        $education = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:Education')
            ->findAll();

        foreach ($education as $edu) {
            $educationTableView->getEducation()->add($edu);
        }

        $form = $this->createForm(new EducationTableViewType(), $educationTableView);

        return array(
            'form' => $form->createView(),
        );
    }

    /**
     * @Template
     */
    public function projectHistoryAction()
    {
        $projectHistoryTableView = new ProjectHistoryTableView();

        $projectHistory = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:ProjectHistory')
            ->findAll();

        foreach ($projectHistory as $ph) {
            $projectHistoryTableView->getProjectHistory()->add($ph);
        }

        $form = $this->createForm(new ProjectHistoryTableViewType(), $projectHistoryTableView);

        return array(
            'form' => $form->createView(),
        );
    }

    /**
     * @Template
     */
    public function workHistoryAction()
    {
        $workHistoryTableView = new WorkHistoryTableView();

        $workHistory = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:WorkHistory')
            ->findAll();

        foreach ($workHistory as $wh) {
            $workHistoryTableView->getWorkHistory()->add($wh);
        }

        $form = $this->createForm(new WorkHistoryTableViewType(), $workHistoryTableView);

        return array(
            'form' => $form->createView(),
        );
    }

    /**
     * @Template
     */
    public function skillsAction()
    {
        $skillsTableView = new SkillsTableView();

        $skills = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:Skills')
            ->FindAll();

        foreach ($skills as $skill) {
            $skillsTableView->getSkills()->add($skill);
        }

        $form = $this->createForm(new SkillsTableViewType(), $skillsTableView);

        return array(
            'form' => $form->createView(),
        );
    }

    /**
     * @Template
     */
    public function navigationAction()
    {
        $navigationTableView = new NavigationTableView();

        $navigation = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:Navigation')
            ->FindAll();

        foreach ($navigation as $navItem) {
            $navigationTableView->getNavItems()->add($navItem);
        }

        $form = $this->createForm(new NavigationTableViewType(), $navigationTableView); 

        return array(
            'form' => $form->createView(),
        );
    }

    /**
     * @Template
     */
    public function downloadsAction()
    {
        return $this->render('CorvusAdminBundle:Default:downloads.html.twig');
    }

    /**
     * @Template
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function aboutAction(Request $request)
    {
        $about = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:About')
            ->Find(1);

        if($about == null) {
            $about = new About();
        }

        $form = $this->createForm(new AboutType(), $about);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($about);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Your changes were saved!');
            return $this->redirect($this->generateUrl('CorvusAdminBundle_About'));
        } else {
            if ($form->isSubmitted()) {
                $this->get('session')->getFlashBag()->add('notice', 'Please correct the errors to continue!');
            }
        }
        
        return array(
            'form' => $form->createView(),
        );
    }
}