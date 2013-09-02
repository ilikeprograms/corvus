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
        
        if (!$projectHistory) {
            throw $this->createNotFoundException('No Project History found with id '.$id);
        }
        
        $files = $this->getDoctrine()->getEntityManager()
            ->getRepository('CorvusAdminBundle:ProjectHistory')
            ->findEntityFiles($id);

        $thumbnails = array();

        if ($files) {
            foreach ($files as $file) {
                if ($file->getFileType() === 'image') {
                    $filename = $file->getFilename();
                    $extension = substr($filename, strrpos($filename, '.' ));
                    $thumbnailFileName = str_replace($extension, "", $filename)."_thumb".$extension;
                    
                    if (file_exists($projectHistory->getUploadRootDir() . '/' .$thumbnailFileName)) {
                        $thumbnails[$filename] = $thumbnailFileName;
                    } else {
                        $thumbnails[$filename] = $filename;
                    }
                }
                
                $projectHistory->addFile($file);
            }
        }

        return $this->render('CorvusFrontendBundle:'.$template_choice.':projectHistoryId.html.twig', array(
            'projectHistory' => $projectHistory, 'thumbnails' => $thumbnails,
        ));
    }
}
