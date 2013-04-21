<?php

namespace Corvus\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class WorkHistoryController extends Controller
{
    public function findByIdAction($id)
    {
        $template_choice = $this->container->get('portfolioinforepository')->getTemplateChoice();

        $workHistory = $this->getDoctrine()->getEntityManager()
            ->getRepository('CorvusAdminBundle:WorkHistory')->Find($id);

        if(!$workHistory)
        {
            throw $this->createNotFoundException('No Work History found with id '.$id);
        }

        return $this->render('CorvusFrontendBundle:'.$template_choice.':workHistoryId.html.twig', array(
            'workHistory' => $workHistory,
        ));
    }
}
