<?php

// src/Corvus/AdminBundle/Controller/ProjectHistoryController.php
namespace Corvus\AdminBundle\Controller;

use Corvus\AdminBundle\Entity\ProjectHistory,
    Corvus\AdminBundle\Form\Type\ProjectHistoryType,
    Corvus\AdminBundle\Entity\ProjectHistoryTableView,
    Corvus\CoreBundle\Controller\TableViewController;


class ProjectHistoryController extends TableViewController
{
    public function __construct()
    {
        // Give the TableViewController parent the data it needs to construct the table view and methods
        parent::__construct(
            new ProjectHistory(),
            new ProjectHistoryType(),
            ProjectHistoryTableView::getDataName(),
            ProjectHistoryTableView::getTypeName()
        );
    }

    /**
     * Publishes the Work History which matches the id submitted with the route.
     * 
     * @param ProjectHistory $projectHistory The Project History to publish.
     * 
     * @return Response
     */
    public function publishAction(ProjectHistory $projectHistory)
    {
        return $this->changePublishState($projectHistory, true);
    }
    
    /**
     * De-Publishes the Project History which matches the id submitted with the route.
     * 
     * @param ProjectHistory $projectHistory The Project History to publish.
     * 
     * @return Response
     */
    public function depublishAction(ProjectHistory $projectHistory)
    {
        return $this->changePublishState($projectHistory, false);
    }

    /**
     * Sets the isPublished state of this entity, to the $publishState provided.
     * 
     * @param ProjectHistory $projectHistory The Project History to update published state.
     * 
     * @param boolean $publishState True/False state.
     */
    private function changePublishState(ProjectHistory $projectHistory, $publishState)
    {
        $projectHistory->setIsPublished($publishState);

        $em = $this->getDoctrine()->getManager();
        $em->persist($projectHistory);
        $em->flush();

        $this->get('session')->getFlashBag()->add('notice', json_encode(array(
            'title'     => 'Published state has been updated!',
            'level'     => 'info'
        )));

        return $this->redirect($this->generateUrl('admin_' . $this->ogEntity->getRouteStem()));
    }
}