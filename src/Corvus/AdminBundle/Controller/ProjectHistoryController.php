<?php

namespace Corvus\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Corvus\AdminBundle\Entity\ProjectHistory;
use Corvus\AdminBundle\Form\Type\ProjectHistoryType;


class ProjectHistoryController extends Controller
{
    public function newAction(Request $request)
    {
        $projectHistory = new ProjectHistory();

        $form = $this->createForm(new ProjectHistoryType(), $projectHistory);
        $form->remove('check');

        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                //$projectHistory->images = $form->get('images')->getData();
                foreach ($projectHistory->images as $key => $value) {
                    $value->ProjectHistory = $projectHistory;
                }
                $em->persist($projectHistory);
                $em->flush();

                $this->get('session')->setFlash('notice', 'New Project History was added!');

                return $this->redirect($this->generateUrl('CorvusAdminBundle_ProjectHistory'));
            } else {
                $this->get('session')->setFlash('notice', 'Please correct the errors to continue!');
            }
        }

        return $this->render('CorvusAdminBundle:Default:newProjectHistory.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function editAction($id, Request $request)
    {
        $projectHistory = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:ProjectHistory')
            ->find($id);

        if (!$projectHistory) {
            throw $this->createNotFoundException('No Project History found with id '.$id);
        }

        $thumbnails = [];

        if($projectHistory->images) {
            foreach ($projectHistory->getImages()->getValues() as $key ) {
                $path = $key->getPath();
                $extension = substr($path, strrpos($path, '.' ));
                $thumbnails[] = str_replace($extension, "", $path)."_thumb".$extension;
            }
        }

        $form = $this->createForm(new ProjectHistoryType(), $projectHistory);
        $form->remove('check');

        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $projectHistory->updated = new \DateTime("now");

                foreach ($projectHistory->images as $key => $value) {
                    $value->ProjectHistory = $projectHistory;
                }

                $em->persist($projectHistory);
                $em->flush();

                $this->get('session')->setFlash('notice', 'Your changes were saved!');
                
                return $this->redirect($this->generateUrl('CorvusAdminBundle_ProjectHistory'));
            } else {
                $this->get('session')->setFlash('notice', 'Please correct the errors to continue!');
            }
        }

        return $this->render('CorvusAdminBundle:Default:editProjectHistory.html.twig', array(
            'form' => $form->createView(), 'thumbnails' => $thumbnails,
        ));
    }

    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $data = $request->request->get('projectHistoryTableView');

        if(isset($data)) {
            foreach ($data['projectHistory'] as $key => $value) {
                if(is_int((int)$value['check']) == true)
                {
                    $phToRemove = $em
                       ->getRepository('CorvusAdminBundle:ProjectHistory')
                       ->Find($value['check']);

                    if(isset($phToRemove))
                    {
                        $em->remove($phToRemove);
                    }
                }
            }
        }
        if(!$id == null)
        {
            $phToRemove = $em->getRepository('CorvusAdminBundle:ProjectHistory')
                ->Find($id);

            $em->remove($phToRemove);
        }

        $em->flush();

        $this->get('session')->setFlash('notice', 'Selected Project History was deleted!');
        return $this->redirect($this->generateUrl('CorvusAdminBundle_ProjectHistory'));
    }
}
