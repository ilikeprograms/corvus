<?php

// src/Corvus/AdminBundle/Controller/WorkHistoryController.php
namespace Corvus\AdminBundle\Controller;

use Corvus\AdminBundle\Entity\WorkHistory,
    Corvus\AdminBundle\Form\Type\WorkHistoryType,
    Corvus\AdminBundle\Entity\WorkHistoryTableView,
    Corvus\CoreBundle\Controller\TableViewController;


class WorkHistoryController extends TableViewController
{
    public function __construct()
    {
        // Give the TableViewController parent the data it needs to construct the table view and methods
        parent::__construct(
            new WorkHistory(),
            new WorkHistoryType(),
            WorkHistoryTableView::getDataName(),
            WorkHistoryTableView::getTypeName()
        );
    }
    
    /**
     * Publishes the Work History which matches the id submitted with the route.
     * 
     * @param WorkHistory $workHistory The Work History to publish.
     * 
     * @return Response
     */
    public function publishAction(WorkHistory $workHistory)
    {
        return $this->changePublishState($workHistory, true);
    }
    
    /**
     * De-Publishes the Work History which matches the id submitted with the route.
     * 
     * @param WorkHistory $workHistory The Work History to publish.
     * 
     * @return Response
     */
    public function depublishAction(WorkHistory $workHistory)
    {
        return $this->changePublishState($workHistory, false);
    }

    /**
     * Sets the isPublished state of this entity, to the $publishState provided.
     * 
     * @param WorkHistory $workHistory The Work History to update published state.
     * 
     * @param boolean $publishState True/False state.
     */
    private function changePublishState(WorkHistory $workHistory, $publishState)
    {
        $workHistory->setIsPublished($publishState);

        $em = $this->getDoctrine()->getManager();
        $em->persist($workHistory);
        $em->flush();

        $this->get('session')->getFlashBag()->add('notice', json_encode(array(
            'title'     => 'Published state has been updated!',
            'level'     => 'info'
        )));

        return $this->redirect($this->generateUrl('admin_' . $this->ogEntity->getRouteStem()));
    }
}