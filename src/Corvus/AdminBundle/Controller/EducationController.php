<?php

namespace Corvus\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Corvus\AdminBundle\Entity\Education;
use Corvus\AdminBundle\Form\Type\EducationType;


class EducationController extends Controller
{
    public function newAction(Request $request)
    {
        $education = new Education();

        $form = $this->createForm(new EducationType(), $education);
        $form->remove('check');

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($education);
                $em->flush();

                $this->get('session')->setFlash('notice', 'New Education was added!');
                return $this->redirect($this->generateUrl('CorvusAdminBundle_Education'));
            } else {
                $this->get('session')->setFlash('notice', 'Please correct the errors to continue!');
            }
        }

        return $this->render('CorvusAdminBundle:Default:newEducation.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function editAction($id, Request $request)
    {
        $education = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:Education')
            ->find($id);

        if (!$education) {
            throw $this->createNotFoundException('No education found with id '.$id);
        }

        $form = $this->createForm(new EducationType(), $education);
        $form->remove('check');
        
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($education);
                $em->flush();

                $this->get('session')->setFlash('notice', 'Your changes were saved!');
                return $this->redirect($this->generateUrl('CorvusAdminBundle_Education'));
            } else {
                $this->get('session')->setFlash('notice', 'Please correct the errors to continue!');
            }
        }

        return $this->render('CorvusAdminBundle:Default:editEducation.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $data = $request->request->get('educationTableView');

        if(isset($data)) {
            foreach ($data['education'] as $key => $value) {
                if(is_int((int)$value['check']) == true)
                {
                    $eduToRemove = $em
                       ->getRepository('CorvusAdminBundle:Education')
                       ->Find($value['check']);

                    if(isset($eduToRemove))
                    {
                        $em->remove($eduToRemove);
                    }
                }
            }
        }
        if(!$id == null)
        {
            $eduToRemove = $em->getRepository('CorvusAdminBundle:Education')
                ->Find($id);

            $em->remove($eduToRemove);
        }

        $em->flush();

        $this->get('session')->setFlash('notice', 'Selected Education was deleted!');
        return $this->redirect($this->generateUrl('CorvusAdminBundle_Education'));
    }
}
