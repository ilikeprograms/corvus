<?php

// src/Corvus/CoreBundle/Controller/TableViewController.php
namespace Corvus\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request,

    Corvus\CoreBundle\Controller\AbstractTableViewController;


abstract class TableViewController extends AbstractTableViewController
{
    public function __construct($entity, $formType, $tableViewDataName, $tableViewTypeName)
    {
        // Explicitly Construct the variables here. More clear when editing methods here which use these.
        $this->ogEntity = $entity;
        $this->formType = $formType;
        $this->tableViewDataName = $tableViewDataName;
        $this->tableViewTypeName = $tableViewTypeName;
    }

    /**
     * {@inheritdoc}
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm($this->formType, $this->ogEntity);
        $form->remove('check');

        $form->handleRequest($request);

        if ($form->isValid()) {
            // Find the Max row order for this Entity
            $maxRowOrder = $this->getDoctrine()
                ->getRepository('CorvusAdminBundle:' . $this->ogEntity->getRepoName())
                ->findMaxRowOrder();
            
            // Increase the row_order by 1
            $this->ogEntity->setRowOrder($maxRowOrder + 1);

            $em = $this->getDoctrine()->getManager();
            $em->persist($this->ogEntity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'New ' . $this->ogEntity->getName() . ' was added!');

            return $this->redirect($this->generateUrl('admin_' . $this->ogEntity->getRouteStem()));
        } else {
            if ($form->isSubmitted()) {
                $this->get('session')->getFlashBag()->add('notice', 'Please correct the errors to continue!');
            }
        }

        return $this->render('CorvusAdminBundle:Default:new' . $this->ogEntity->getRepoName() . '.html.twig', array(
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
        $this->ogEntity = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:' . $this->ogEntity->getRepoName())
            ->find($id);

        if (!$this->ogEntity) {
            throw $this->createNotFoundException('No ' . $this->ogEntity->getName() . ' found with id ' . $id);
        }

        $form = $this->createForm($this->formType, $this->ogEntity);
        $form->remove('check');
        
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($this->ogEntity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Your changes were saved!');
            return $this->redirect($this->generateUrl('admin_' . $this->ogEntity->getRouteStem()));
        } else {
            if ($form->isSubmitted()) {
                $this->get('session')->getFlashBag()->add('notice', 'Please correct the errors to continue!');
            }
        }

        return $this->render('CorvusAdminBundle:Default:edit' . $this->ogEntity->getRepoName() . '.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function orderUpAction($id)
    {
        $this->swapRowOrder($id, 'Up');
        return $this->redirect($this->generateUrl('admin_' . $this->ogEntity->getRouteStem()));
    }

    /**
     * {@inheritdoc}
     */
    public function orderDownAction($id)
    {
    	$this->swapRowOrder($id, 'Down');
        return $this->redirect($this->generateUrl('admin_' . $this->ogEntity->getRouteStem()));
    }

    protected function swapRowOrder($id, $direction)
    {
        /* Call the changeRowOrder method on this entity's repository
         * Send the direction and Id.
         * 
         * @link \Corvus\AdminBundle\ILP\ORM\Repository\BaseEntityRepository
         */
        $this->getDoctrine()->getManager()
            ->getRepository('CorvusAdminBundle:' . $this->ogEntity->getRepoName())
            ->changeRowOrder($id, $direction);

        $this->get('session')->getFlashBag()->add('notice', 'Order has been updated!');
    }

    /**
     * {@inheritdoc}
     */
    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $tableView = $request->request->get($this->tableViewTypeName);
        
        // TableView would ve submitted to the request if its a batch action
        if(isset($tableView)) {
            // Attempt to delete every 'check'ed entity
            foreach ($tableView[$this->tableViewDataName] as $entity) {
                // The check field holds the ID of the entity
                if(is_int((int)$entity['check']) == true)
                {
                    $entityToRemove = $em
                       ->getRepository('CorvusAdminBundle:' . $this->ogEntity->getRepoName())
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
            $entityToRemove = $em->getRepository('CorvusAdminBundle:' . $this->ogEntity->getRepoName())
                ->Find($id);

            // Remove it
            $em->remove($entityToRemove);
        }

        // Flush the Entity manager to save all deletions
        $em->flush();

        $this->get('session')->getFlashBag()->add('notice', 'Selected ' . $this->ogEntity->getName() . ' was deleted!');
        return $this->redirect($this->generateUrl('admin_' . $this->ogEntity->getRouteStem()));
    }
}