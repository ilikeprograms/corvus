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
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('project_description', 'textarea', array(
			'label' => 'Project Description:',
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('role', 'text', array(
			'label' => 'Role:',
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('process', 'textarea', array(
			'label' => 'Process:',
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('feedback_received', 'textarea', array(
			'label' => 'Feedback Received:',
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('reflection', 'textarea', array(
			'label' => 'Reflection:',
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('url', 'url', array(
			'label' => 'Url:',
			'label_attr' => array(
                'class' => 'fontBold',
            ),
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
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('meta_description', 'textarea', array(
			'label' => 'Meta Description:',
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('check', 'checkbox', array(
			'property_path' => false,
			'attr' => array(
				'class' => 'case',
			),
			'label_attr' => array(
                'class' => 'fontBold',
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