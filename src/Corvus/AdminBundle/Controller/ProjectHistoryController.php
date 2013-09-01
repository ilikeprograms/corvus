<?php

// src/Corvus/AdminBundle/Controller/ProjectHistoryController.php
namespace Corvus\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request,

    Corvus\AdminBundle\Entity\ProjectHistory,
    Corvus\AdminBundle\Form\Type\ProjectHistoryType,
    Corvus\AdminBundle\Entity\ProjectHistoryTableView,
    Corvus\AdminBundle\ILP\Controller\TableViewController;


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
    
    public function newAction(Request $request)
    {        
        $form = $this->createForm($this->_formType, $this->_entity);
        $form->remove('check');

        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                
                foreach ($this->_entity->getFiles() as $files)
                {
                    $em->persist($files);
                }
                
                $em->persist($this->_entity);
                $em->flush();

                $this->get('session')->setFlash('notice', 'New Project History was added!');
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
            throw $this->createNotFoundException('No ' . $this->getRepoName() . ' found with id ' . $id);
        }
        
        $files = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:' . $this->_entity->getRepoName())
            ->findEntityFiles($id);

        $thumbnails = array();

        if ($files) {
            foreach ($files as $file) {
                if ($file->getFileType() === 'image') {
                    $filename = $file->getFilename();
                    $extension = substr($filename, strrpos($filename, '.' ));
                    $thumbnailFileName = str_replace($extension, "", $filename)."_thumb".$extension;
                    
                    if (file_exists($this->_entity->getUploadRootDir() . '/' .$thumbnailFileName)) {
                        $thumbnails[$filename] = $thumbnailFileName;
                    } else {
                        $thumbnails[$filename] = $filename;
                    }
                }
                
                $this->_entity->addFile($file);
            }
        }

        $form = $this->createForm($this->_formType, $this->_entity);
        $form->remove('check');
        $form->remove('row_order');
        

        if ($request->getMethod() == 'POST') {
            $form->bind($request);
                
            if ($form->isValid() || !$form->getErrors()) {
                $em = $this->getDoctrine()->getEntityManager();
                
                $this->_entity->setUpdated(new \DateTime("now"));
                
                foreach ($this->_entity->getFiles() as $file) {
                    $em->persist($file);
                }
                
                $em->persist($this->_entity);
                $em->flush();

                $this->get('session')->setFlash('notice', 'Your changes were saved!');

               return $this->redirect($this->generateUrl('CorvusAdminBundle_' . $this->_entity->getRepoName()));
            } else {
                $this->get('session')->setFlash('notice', 'Please correct the errors to continue!');
            }
        }
        
        return $this->render('CorvusAdminBundle:Default:edit' . $this->_entity->getRepoName() . '.html.twig', array(
            'form' => $form->createView(), 'thumbnails' => $thumbnails,
        ));
    }
}