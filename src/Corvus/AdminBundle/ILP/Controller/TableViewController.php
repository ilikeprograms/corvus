<?php

// src/Corvus/AdminBundle/ILP/Controller/TableViewController.php
namespace Corvus\AdminBundle\ILP\Controller;

use Symfony\Component\HttpFoundation\Request,

    Corvus\AdminBundle\ILP\Controller\AbstractTableViewController;

abstract class TableViewController extends AbstractTableViewController
{
    public function __construct($entity, $formType, $tableViewDataName, $tableViewTypeName)
    {
        // Explicitly Construct the variables here. More clear when editing methods here which use these.
        $this->_entity = $entity;
        $this->_formType = $formType;
        $this->_tableViewDataName = $tableViewDataName;
        $this->_tableViewTypeName = $tableViewTypeName;
    }

    public function newAction(Request $request)
    {
        $form = $this->createForm($this->_formType, $this->_entity);
        $form->remove('check');

        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($this->_entity);
                $em->flush();

                $this->get('session')->setFlash('notice', 'New ' . ucfirst($this->_entity->getName()) . ' was added!');

                return $this->redirect($this->generateUrl('CorvusAdminBundle_' . $this->_entity->getRepoName()));
            } else {
                $this->get('session')->setFlash('notice', 'Please correct the errors to continue!');
            }
        }

        return $this->render('CorvusAdminBundle:Default:new' . $this->_entity->getRepoName() . '.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function editAction($id, Request $request)
    {
        $this->_entity = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:' . $this->_entity->getRepoName())
            ->find($id);

        if (!$this->_entity) {
            throw $this->createNotFoundException('No ' . $this->_entity->getName() . ' found with id ' . $id);
        }

        $form = $this->createForm($this->_formType, $this->_entity);
        $form->remove('row_order');
        $form->remove('check');
        
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($this->_entity);
                $em->flush();

                $this->get('session')->setFlash('notice', 'Your changes were saved!');
                return $this->redirect($this->generateUrl('CorvusAdminBundle_' . $this->_entity->getRepoName()));
            } else {
                $this->get('session')->setFlash('notice', 'Please correct the errors to continue!');
            }
        }

        return $this->render('CorvusAdminBundle:Default:edit' . $this->_entity->getRepoName() . '.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function orderUpAction($id)
    {
        $this->swapRowOrder($id, 'Up');
        return $this->redirect($this->generateUrl('CorvusAdminBundle_' . $this->_entity->getRepoName()));
    }

	public function orderDownAction($id)
    {
    	$this->swapRowOrder($id, 'Down');
        return $this->redirect($this->generateUrl('CorvusAdminBundle_' . $this->_entity->getRepoName()));
    }

    protected function swapRowOrder($id, $direction)
    {
        $this->getDoctrine()->getEntityManager()
            ->getRepository('CorvusAdminBundle:' . $this->_entity->getRepoName())
            ->changeRowOrder($id, $direction);

        $this->get('session')->setFlash('notice', 'Order has been updated!');
    }

	public function deleteAction($id, Request $request)
	{
		$em = $this->getDoctrine()->getEntityManager();

        $tableView = $request->request->get($this->_tableViewTypeName);

        if(isset($tableView)) {
            foreach ($tableView[$this->_tableViewDataName] as $key => $value) {
                if(is_int((int)$value['check']) == true)
                {
                    $entityToRemove = $em
                       ->getRepository('CorvusAdminBundle:' . $this->_entity->getRepoName())
                       ->Find($value['check']);

                    if(isset($entityToRemove))
                    {
                        $em->remove($entityToRemove);
                    }
                }
            }
        }
        if(!$id == null)
        {
            $entityToRemove = $em->getRepository('CorvusAdminBundle:' . $this->_entity->getRepoName())
                ->Find($id);

            $em->remove($entityToRemove);
        }

        $em->flush();

        $this->get('session')->setFlash('notice', 'Selected ' . $this->_entity->getName() . ' was deleted!');
        return $this->redirect($this->generateUrl('CorvusAdminBundle_' . $this->_entity->getRepoName()));
	}
}