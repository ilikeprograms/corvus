<?php

namespace Corvus\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Corvus\AdminBundle\Entity\Skills;
use Corvus\AdminBundle\Form\Type\SkillsType;


class SkillsController extends Controller
{
    public function newAction(Request $request)
    {
        $skills = new Skills();

        $form = $this->createForm(new SkillsType(), $skills);
        $form->remove('check');

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($skills);
                $em->flush();

                $this->get('session')->setFlash('notice', 'New Skill was added!');
                return $this->redirect($this->generateUrl('CorvusAdminBundle_Skills'));
            } else {
                $this->get('session')->setFlash('notice', 'Please correct the errors to continue!');
            }
        }

        return $this->render('CorvusAdminBundle:Default:newSkills.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function editAction($id, Request $request)
    {
        $skills = $this->getDoctrine()
            ->getRepository('CorvusAdminBundle:Skills')
            ->find($id);

        if (!$skills) {
            throw $this->createNotFoundException('No skill found with id '.$id);
        }

        $form = $this->createForm(new SkillsType(), $skills);
        $form->remove('check');
        
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($skills);
                $em->flush();

                $this->get('session')->setFlash('notice', 'Your changes were saved!');
                return $this->redirect($this->generateUrl('CorvusAdminBundle_Skills'));
            } else {
                $this->get('session')->setFlash('notice', 'Please correct the errors to continue!');
            }
        }

        return $this->render('CorvusAdminBundle:Default:editSkills.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $data = $request->request->get('skillsTableView');

        if(isset($data)) {
            foreach ($data['skills'] as $key => $value) {
                if(is_int((int)$value['check']) == true)
                {
                    $skillToRemove = $em
                       ->getRepository('CorvusAdminBundle:Skills')
                       ->Find($value['check']);

                    if(isset($skillToRemove))
                    {
                        $em->remove($skillToRemove);
                    }
                }
            }
        }
        if(!$id == null)
        {
            $skillToRemove = $em->getRepository('CorvusAdminBundle:Skills')
                ->Find($id);

            $em->remove($skillToRemove);
        }

        $em->flush();

        $this->get('session')->setFlash('notice', 'Selected Skill was deleted!');
        return $this->redirect($this->generateUrl('CorvusAdminBundle_Skills'));
    }
}
