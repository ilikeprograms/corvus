<?php

// src/Corvus/AdminBundle/Controller/NavigationController.php
namespace Corvus\AdminBundle\Controller;

use Corvus\AdminBundle\Entity\Navigation,
    Corvus\AdminBundle\Form\Type\NavigationType,
    Corvus\AdminBundle\Entity\NavigationTableView,
    Corvus\AdminBundle\ILP\Controller\TableViewController;


class NavigationController extends TableViewController
{
    public function __construct()
    {
        // Give the TableViewController parent the data it needs to construct the table view and methods
        parent::__construct(
            new Navigation(),
            new NavigationType(),
            NavigationTableView::getDataName(),
            NavigationTableView::getTypeName()
        );
    }

//    public function newAction(Request $request)
//    {
//        $form = $this->createForm($this->formType, $this->ogEntity);
//        $form->remove('check');
//        
//        $form->handleRequest($request);
//        
//        $this->ogEntity->setRowOrder(0);
//
//        if ($form->isValid()) {
//             // Find the Max row order for this Entity
//            $maxRowOrder = $this->getDoctrine()
//                ->getRepository('CorvusAdminBundle:' . $this->ogEntity->getRepoName())
//                ->findMaxRowOrder();
//            
//            // Increase the row_order by 1
//            $this->ogEntity->setRowOrder($maxRowOrder + 1);
////            $navigationRequest = $request->get($this->formType->getName());
//
////            if($navigationRequest['internalRoutes'] != null)
////            {
////                $navigationArray = array(
////                    '_token' => $navigationRequest['_token'],
////                    'row_order' => $this->ogEntity->getRowOrder(),
////                    'href' => $navigationRequest['internalRoutes'],
////                    'title' => $navigationRequest['title'],
////                    'alt' => $navigationRequest['alt'],
////                    'internalRoutes' => $navigationRequest['internalRoutes']
////                );
////
////                $request->request->set('navigation', $navigationArray);
////            }
//
//            $em = $this->getDoctrine()->getEntityManager();
//            $em->persist($this->ogEntity);
//            $em->flush();
//
//            $this->get('session')->getFlashBag()->add('notice', 'New Navigation was added!');
//
//            return $this->redirect($this->generateUrl('CorvusAdminBundle_Navigation'));
//        } else {
//            if ($form->isSubmitted()) {
//                $this->get('session')->getFlashBag()->add('notice', 'Please correct the errors to continue!');
//            }
//        }
//
//        return $this->render('CorvusAdminBundle:Default:newNavigation.html.twig', array(
//            'form' => $form->createView(),
//        ));
//    }
    

//    public function editAction($id, Request $request)
//    { 
//        $this->ogEntity = $this->getDoctrine()
//            ->getRepository('CorvusAdminBundle:Navigation')
//            ->find($id);
//
//        if (!$this->ogEntity) {
//            throw $this->createNotFoundException('No navigation found with id ' . $id);
//        }
//
//        $form = $this->createForm($this->formType, $this->ogEntity);
//        $form->remove('check');
//
//        if ($request->getMethod() == 'POST') {
//            $form->bindRequest($request);
//
//            $internalRoute = $form->get('internalRoutes')->getData();
//            if($internalRoute != null) {
//                $navigationArray = array(
//                    '_token' => $form->get('_token')->getData(),
//                    'row_order' => $this->ogEntity->getRowOrder(),
//                    'href' => $internalRoute,
//                    'title' => $form->get('title')->getData(),
//                    'alt' => $form->get('alt')->getData(),
//                    'internalRoutes' => $internalRoute
//                );
//
//                $request->request->set('navigation', $navigationArray);
//                $form->bindRequest($request);
//            }
//            
//            if ($form->isValid()) {
//                $em = $this->getDoctrine()->getEntityManager();
//                $em->persist($this->ogEntity);
//                $em->flush();
//
//                $this->get('session')->getFlashBag()->add('notice', 'Your changes were saved!');
//
//                return $this->redirect($this->generateUrl('CorvusAdminBundle_Navigation'));
//            } else {
//                $this->get('session')->getFlashBag()->add('notice', 'Please correct the errors to continue!');
//            }
//        }
//
//        return $this->render('CorvusAdminBundle:Default:editNavigation.html.twig', array(
//            'form' => $form->createView(),
//        ));
//    }
}
