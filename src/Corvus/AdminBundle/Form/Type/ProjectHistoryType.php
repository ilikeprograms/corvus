<?php

// src/Corvus/AdminBundle/Form/Type/ProjectHistoryType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProjectHistoryType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('project_name', 'text', array(
			'label' => 'Project Name:',
			'attr' => array(
				'placeholder' => 'E.g Corvus',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('project_description', 'textarea', array(
			'label' => 'Project Description:',
			'attr' => array(
				'placeholder' => 'E.g Corvus is a Portfolio Content Management System. I was responsible for making it etc',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('role', 'text', array(
			'label' => 'Role:',
			'attr' => array(
				'placeholder' => 'E.g Creator',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('process', 'textarea', array(
			'label' => 'Process:',
			'attr' => array(
				'placeholder' => 'E.g I used Symfony 2 and slowly built the project using two prototypes',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
            'required' => false,
		));
		$builder->add('feedback_received', 'textarea', array(
			'label' => 'Feedback Received:',
			'attr' => array(
				'placeholder' => 'E.g The project was well received by the university staff and was praised for its excellence',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
            'required' => false,
		));
		$builder->add('reflection', 'textarea', array(
			'label' => 'Reflection:',
			'attr' => array(
				'placeholder' => 'E.g The whole experience of building a complete CMS was difficult but very rewarding',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
            'required' => false,
		));
		$builder->add('url', 'url', array(
			'label' => 'Url:',
			'attr' => array(
				'placeholder' => 'E.g ilikeprograms.com',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
            'required' => false,
		));
		$builder->add('images', 'collection', array(
			'type' => new ImageType(),
			'allow_add' => true,
			'prototype' => true,
			'by_reference' => false,
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('meta_title', 'text', array(
			'label' => 'Meta Title:',
			'attr' => array(
				'placeholder' => 'E.g Corvus |',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('meta_description', 'textarea', array(
			'label' => 'Meta Description:',
			'attr' => array(
				'placeholder' => 'E.g The Corvus project is a Portfolio Content Management system that allows users to manage their personal portfolio information',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
            'required' => false,
		));
		$builder->add('check', 'checkbox', array(
			'property_path' => false,
			'attr' => array(
				'class' => 'case',
			),
		));
	}

	public function getDefaultOptions(array $options)
	{
		return array(
			'data_class' => 'Corvus\AdminBundle\Entity\ProjectHistory',
		);
	}

	public function getName()
	{
		return 'projectHistory';
	}
}