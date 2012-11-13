<?php

namespace Corvus\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class WorkHistoryController extends Controller
{
    public function findByIdAction($id)
    {
        $workHistory = $this->getDoctrine()->getEntityManager()
            ->getRepository('CorvusAdminBundle:WorkHistory')->Find($id);

        if(!$workHistory)
        {
            throw $this->createNotFoundException('No Work History found with id '.$id);
        }

        return $this->render('CorvusFrontendBundle:Default:workHistoryId.html.twig', array(
            'workHistory' => $workHistory,
        ));
    }
}
