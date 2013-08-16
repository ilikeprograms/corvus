<?php

// src/Corvus/FrontendBundle/Controller/ProjectHistory.php
namespace Corvus\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ProjectHistoryController extends Controller
{
    public function findByIdAction($id)
    {
        $template_choice = $this->container->get('portfolioinforepository')->getTemplateChoice();
        
        $projectHistory = $this->getDoctrine()->getEntityManager()
            ->getRepository('CorvusAdminBundle:ProjectHistory')->Find($id);

        $thumbnails = array();

        if($projectHistory->images) {
            foreach ($projectHistory->getImages()->getValues() as $key ) {
                $path = $key->getPath();
                $extension = substr($path, strrpos($path, '.' ));
                $thumbnails[] = str_replace($extension, "", $path)."_thumb".$extension;
            }
        }

        if(!$projectHistory)
        {
            throw $this->createNotFoundException('No Project History found with id '.$id);
        }

        return $this->render('CorvusFrontendBundle:'.$template_choice.':projectHistoryId.html.twig', array(
            'projectHistory' => $projectHistory, 'thumbnails' => $thumbnails,
        ));
    }
}
