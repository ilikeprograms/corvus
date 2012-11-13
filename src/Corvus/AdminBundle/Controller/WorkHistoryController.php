<?php

namespace Corvus\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Corvus\AdminBundle\Entity\WorkHistory;
use Corvus\AdminBundle\Form\Type\WorkHistoryType;


class WorkHistoryController extends Controller
{
    public function newAction(Request $request)
    {
        $workHistory = new WorkHistory();

        $form = $this->createForm(new WorkHistoryType(), $workHistory);
        $form->remove('check');

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($workHistory);
                $em->flush();

                $this->get('session')->setFlash('notice', 'New Work History was added!');

                return $this->redirect($this->generateUrl('CorvusAdminBundle_WorkHistory'));
            } else {
                $this->get('session')->setFlash('notice', 'Please correct the errors to continue!');
            }
        }

        return $this->render('CorvusAdminBundle:Default:newWorkHistory.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function editAction($id, Request $request)
    {
        $workHistory = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:WorkHistory')
            ->find($id);

        if (!$workHistory) {
            throw $this->createNotFoundException('No Work History found with id '.$id);
        }

        $form = $this->createForm(new WorkHistoryType(), $workHistory);
        $form->remove('check');

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($workHistory);
                $em->flush();

                $this->get('session')->setFlash('notice', 'Your changes were saved!');
                return $this->redirect($this->generateUrl('CorvusAdminBundle_WorkHistory'));
            } else {
                $this->get('session')->setFlash('notice', 'Please correct the errors to continue!');
            }
        }

        return $this->render('CorvusAdminBundle:Default:editWorkHistory.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $data = $request->request->get('workHistoryTableView');

        if(isset($data)) {
            foreach ($data['workHistory'] as $key => $value) {
                if(is_int((int)$value['check']) == true)
                {
                    $whToRemove = $em
                       ->getRepository('CorvusAdminBundle:WorkHistory')
                       ->Find($value['check']);

                    if(isset($whToRemove))
                    {
                        $em->remove($whToRemove);
                    }
                }
            }
        }
        if(!$id == null)
        {
            $whToRemove = $em->getRepository('CorvusAdminBundle:WorkHistory')
                ->Find($id);

            $em->remove($whToRemove);
        }

        $em->flush();

        $this->get('session')->setFlash('notice', 'Selected Work History was deleted!');
        return $this->redirect($this->generateUrl('CorvusAdminBundle_WorkHistory'));
    }
}
