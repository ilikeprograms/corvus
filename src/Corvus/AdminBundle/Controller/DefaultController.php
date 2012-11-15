<?php

namespace Corvus\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormError;

use Corvus\AdminBundle\Entity\GeneralSettings;
use Corvus\AdminBundle\Entity\EducationTableView;
use Corvus\AdminBundle\Entity\ProjectHistoryTableView;
use Corvus\AdminBundle\Entity\WorkHistoryTableView;
use Corvus\AdminBundle\Entity\SkillsTableView;
use Corvus\AdminBundle\Entity\NavigationTableView;
use Corvus\AdminBundle\Entity\About;

use Corvus\AdminBundle\Form\Type\GeneralSettingsType;
use Corvus\AdminBundle\Form\Type\EducationTableViewType;
use Corvus\AdminBundle\Form\Type\ProjectHistoryTableViewType;
use Corvus\AdminBundle\Form\Type\WorkHistoryTableViewType;
use Corvus\AdminBundle\Form\Type\SkillsTableViewType;
use Corvus\AdminBundle\Form\Type\NavigationTableViewType;
use Corvus\AdminBundle\Form\Type\AboutType;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CorvusAdminBundle:Default:index.html.twig');
    }

    public function generalSettingsAction(Request $request)
    {
        $generalSettings = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:GeneralSettings')
            ->Find(1);

        if($generalSettings == null) {
            $generalSettings = new GeneralSettings();
        }

        $form = $this->createForm(new GeneralSettingsType(), $generalSettings);

        if($request->getMethod() == 'POST')
        {
            $form->bind($request);
            $em = $this->getDoctrine()->getEntityManager();

            if($form->isValid())
            {
                $em->persist($generalSettings);
                $em->flush();

                $this->get('session')->setFlash('notice', 'General Settings have been saved.');
                return $this->redirect($this->generateUrl('CorvusAdminBundle_GeneralSettings'));
            } else {
                $this->get('session')->setFlash('notice', 'Please correct the errors to continue!');
            }
        }

        return $this->render('CorvusAdminBundle:Default:generalSettings.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function siteDesignAction()
    {
        return $this->render('CorvusAdminBundle:Default:siteDesign.html.twig');
    }

    public function educationAction()
    {
        $educationTableView = new EducationTableView();

        $education = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:Education')
            ->findAll();

        foreach ($education as $edu) {
            $educationTableView->getEducation()->add($edu);
        }

        $form = $this->createForm(New EducationTableViewType(), $educationTableView);

        return $this->render('CorvusAdminBundle:Default:education.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function projectHistoryAction()
    {
        $projectHistoryTableView = new ProjectHistoryTableView();

        $projectHistory = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:ProjectHistory')
            ->findAll();

        foreach ($projectHistory as $ph) {
            $projectHistoryTableView->getProjectHistory()->add($ph);
        }

        $form = $this->createForm(New ProjectHistoryTableViewType(), $projectHistoryTableView);

        return $this->render('CorvusAdminBundle:Default:projectHistory.html.twig', array(
            'form' => $form->createView(),
        ));
    }

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

        return $this->render('CorvusAdminBundle:Default:workHistory.html.twig', array(
            'form' => $form->createView(),
        ));
    }

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

        return $this->render('CorvusAdminBundle:Default:skills.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function navigationAction()
    {
        $navigationTableView = new NavigationTableView();

        $navigation = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:Navigation')
            ->findBy(array(), array('navigation_order' => 'ASC'));

        foreach ($navigation as $navItem) {
            $navigationTableView->getNavItems()->add($navItem);
        }

        $form = $this->createForm(new NavigationTableViewType(), $navigationTableView); 

        return $this->render('CorvusAdminBundle:Default:navigation.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function downloadsAction()
    {
        return $this->render('CorvusAdminBundle:Default:downloads.html.twig');
    }

    public function aboutAction(Request $request)
    {
        $about = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:About')
            ->Find(1);

        if(!$about) {
            $about = new About();
        }

        $form = $this->createForm(new AboutType(), $about);

        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($about);
                $em->flush();

                $this->get('session')->setFlash('notice', 'Your changes were saved!');
                return $this->redirect($this->generateUrl('CorvusAdminBundle_About'));
            } else {
                $this->get('session')->setFlash('notice', 'Please correct the errors to continue!');
            }
        }
        
        return $this->render('CorvusAdminBundle:Default:about.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}