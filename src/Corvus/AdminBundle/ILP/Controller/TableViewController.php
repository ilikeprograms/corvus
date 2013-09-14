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

    /**
     * {@inheritdoc}
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm($this->_formType, $this->_entity);
        $form->remove('check');

        if ($request->getMethod() == 'POST') {            
            // Find the Max row order for this Entity
            $maxRowOrder = $this->getDoctrine()
                ->getRepository('CorvusAdminBundle:' . $this->_entity->getRepoName())
                ->findMaxRowOrder();
            
            // Increase the row_order by 1
            $this->_entity->setRowOrder($maxRowOrder + 1);
            /* Rebind the Request, the row order is now set and validated
             * without the user needing to set it
             */
            $form->bindRequest($request);

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

    /**
     * {@inheritdoc}
     * 
     * @throws NotFoundHttpException If no Entity is found with $id.
     */
    public function editAction($id, Request $request)
    {
        $this->_entity = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:' . $this->_entity->getRepoName())
            ->find($id);

        if (!$this->_entity) {
            throw $this->createNotFoundException('No ' . $this->_entity->getName() . ' found with id ' . $id);
        }

        $form = $this->createForm($this->_formType, $this->_entity);
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

    /**
     * {@inheritdoc}
     */
    public function orderUpAction($id)
    {
        $this->_swapRowOrder($id, 'Up');
        return $this->redirect($this->generateUrl('CorvusAdminBundle_' . $this->_entity->getRepoName()));
    }

    /**
     * {@inheritdoc}
     */
    public function orderDownAction($id)
    {
    	$this->_swapRowOrder($id, 'Down');
        return $this->redirect($this->generateUrl('CorvusAdminBundle_' . $this->_entity->getRepoName()));
    }

    protected function _swapRowOrder($id, $direction)
    {
        /* Call the changeRowOrder method on this entity's repository
         * Send the direction and Id.
         * 
         * @link \Corvus\AdminBundle\ILP\ORM\Repository\BaseEntityRepository
         */
        $this->getDoctrine()->getEntityManager()
            ->getRepository('CorvusAdminBundle:' . $this->_entity->getRepoName())
            ->changeRowOrder($id, $direction);

        $this->get('session')->setFlash('notice', 'Order has been updated!');
    }

    /**
     * {@inheritdoc}
     */
    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $tableView = $request->request->get($this->_tableViewTypeName);

        // TableView would ve submitted to the request if its a batch action
        if(isset($tableView)) {
            // Attempt to delete every 'check'ed entity
            foreach ($tableView[$this->_tableViewDataName] as $entity) {
                // The check field holds the ID of the entity
                if(is_int((int)$entity['check']) == true)
                {
                    $entityToRemove = $em
                       ->getRepository('CorvusAdminBundle:' . $this->_entity->getRepoName())
                       ->Find($entity['check']);

                    if(isset($entityToRemove))
                    {
                        // If the Entity is found using the id, remove the entity
                        $em->remove($entityToRemove);
                    }
                }
            }
        }
        // If just a single Id, the delete button next to an entity was clicked
        if(!$id == null)
        {
            // Find the single entity by the Id
            $entityToRemove = $em->getRepository('CorvusAdminBundle:' . $this->_entity->getRepoName())
                ->Find($id);

            // Remove it
            $em->remove($entityToRemove);
        }

        // Flush the Entity manager to save all deletions
        $em->flush();

        $this->get('session')->setFlash('notice', 'Selected ' . ucfirst($this->_entity->getName()) . ' was deleted!');
        return $this->redirect($this->generateUrl('CorvusAdminBundle_' . $this->_entity->getRepoName()));
    }
}