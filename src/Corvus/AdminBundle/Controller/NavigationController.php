<?php

namespace Corvus\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Corvus\AdminBundle\Entity\Navigation;
use Corvus\AdminBundle\Form\Type\NavigationType;


class NavigationController extends Controller
{
    public function newAction(Request $request)
    {
        $navigation = new Navigation();

        $form = $this->createForm(new NavigationType(), $navigation);
        $form->remove('check');

        if ($request->getMethod() == 'POST') {
            $navigationRequest = $request->get('navigation');

            if($navigationRequest['internalRoutes'] != null)
            {
                $navigationArray = array('_token' => $navigationRequest['_token'], 'navigation_order' => $navigationRequest['navigation_order'], 'href' => $navigationRequest['internalRoutes'], 'title' => $navigationRequest['title'], 'alt' => $navigationRequest['alt'], 'internalRoutes' => $navigationRequest['internalRoutes']);    

                $request->request->set('navigation', $navigationArray);
            }

            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($navigation);
                $em->flush();

                $this->get('session')->setFlash('notice', 'New Navigation was added!');

                return $this->redirect($this->generateUrl('CorvusAdminBundle_Navigation'));
            } else {
                $this->get('session')->setFlash('notice', 'Please correct the errors to continue!');
            }
        }

        return $this->render('CorvusAdminBundle:Default:newNavigation.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function orderDownAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $navigation = $em->getRepository('CorvusAdminBundle:Navigation')
            ->findBy(array(), array('navigation_order' => 'ASC'));

        $navItemToChangeOrder = $navigation[$id]->getNavigationOrder();

        $higherNavOrder = $navItemToChangeOrder + 1;

        foreach ($navigation as $nav) {
            if($nav->getNavigationOrder() == $higherNavOrder)
            {
                $nav->setNavigationOrder($navItemToChangeOrder);
                $em->persist($nav);
            }
        }

        $navigation[$id]->setNavigationOrder($navItemToChangeOrder + 1);
        $em->persist($navigation[$id]);

        $em->flush();

        $this->get('session')->setFlash('notice', 'Navigation order has been updated!');
        return $this->redirect($this->generateUrl('CorvusAdminBundle_Navigation'));
    }

    public function orderUpAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $navigation = $em->getRepository('CorvusAdminBundle:Navigation')
            ->findBy(array(), array('navigation_order' => 'ASC'));

        $navItemToChangeOrder = $navigation[$id]->getNavigationOrder();

        $lowerNavOrder = $navItemToChangeOrder - 1;

        foreach ($navigation as $nav) {
            if($nav->getNavigationOrder() == $lowerNavOrder)
            {
                $nav->setNavigationOrder($navItemToChangeOrder);
                $em->persist($nav);
            }
        }

        $navigation[$id]->setNavigationOrder($navItemToChangeOrder - 1);
        $em->persist($navigation[$id]);

        $em->flush();

        $this->get('session')->setFlash('notice', 'Navigation order has been updated!');
        return $this->redirect($this->generateUrl('CorvusAdminBundle_Navigation'));
    }

    public function editAction($id, Request $request)
    {
        $navigation = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:Navigation')
            ->find($id);

        if (!$navigation) {
            throw $this->createNotFoundException('No navigation found with id '.$id);
        }

        $form = $this->createForm(new NavigationType(), $navigation);
        $form->remove('navigation_order');
        $form->remove('check');

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            $internalRoute = $form->get('internalRoutes')->getData();

            if($internalRoute != null)
            {
                $navigationArray = array(
                    '_token' => $form->get('_token')->getData(),
                    'navigation_order' => $form->get('navigation_order')->getData(),
                    'href' => $internalRoute,
                    'title' => $form->get('title')->getData(),
                    'alt' => $form->get('alt')->getData(),
                    'internalRoutes' => $internalRoute );

                $request->request->set('navigation', $navigationArray);
                $form->bindRequest($request);
            }
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($navigation);
                $em->flush();

                $this->get('session')->setFlash('notice', 'Your changes were saved!');

                return $this->redirect($this->generateUrl('CorvusAdminBundle_Navigation'));
            } else {
                $this->get('session')->setFlash('notice', 'Please correct the errors to continue!');
            }
        }

        return $this->render('CorvusAdminBundle:Default:editNavigation.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $data = $request->request->get('navigationTableView');

        if(isset($data)) {

            foreach ($data['navItems'] as $key => $value) {
                if(is_int((int)$value['check']) == true)
                {
                    $navToRemove = $em
                       ->getRepository('CorvusAdminBundle:Navigation')
                       ->Find($value['check']);
                    if(isset($navToRemove))
                    {
                        $em->remove($navToRemove);
                    }
                }
            }
        }
        if(!$id == null)
        {
            $navToRemove = $em->getRepository('CorvusAdminBundle:Navigation')
                ->Find($id);

            $em->remove($navToRemove);
        }

        $em->flush();

        $this->get('session')->setFlash('notice', 'Selected Navigation was deleted!');
        return $this->redirect($this->generateUrl('CorvusAdminBundle_Navigation'));
    }
}
