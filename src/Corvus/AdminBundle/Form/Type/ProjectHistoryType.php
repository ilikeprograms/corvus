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
		));
		$builder->add('project_description', 'textarea', array(
			'label' => 'Project Description:',
		));
		$builder->add('role', 'text', array(
			'label' => 'Role:',
		));
		$builder->add('process', 'textarea', array(
			'label' => 'Process:', 
		));
		$builder->add('feedback_received', 'textarea', array(
			'label' => 'Feedback Received:',
		));
		$builder->add('reflection', 'textarea', array(
			'label' => 'Reflection:',
		));
		$builder->add('url', 'url', array(
			'label' => 'Url:',
		));
		$builder->add('images', 'collection', array(
			'type' => new ImageType(),
			'allow_add' => true,
			'prototype' => true,
			'by_reference' => false,
		));
		$builder->add('meta_title', 'text', array(
			'label' => 'Meta Title:'
		));
		$builder->add('meta_description', 'textarea', array(
			'label' => 'Meta Description:'
		));
		$builder->add('check', 'checkbox', array(
			'property_path' => false,
			'attr' => array(
				'class' => 'case',
		)));
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