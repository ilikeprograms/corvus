<?php

// src/Corvus/AdminBundle/Form/Type/WorkHistoryType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class WorkHistoryType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('employer_name', 'text', array(
			'label' => 'Employer Name:',
		));
		$builder->add('employer_address', 'textarea', array(
			'label' => 'Employer Address:',
		));
		$builder->add('start_date', 'date', array(
			'label' => 'Start Date:',
			'input' => 'datetime',
			'widget' => 'choice',
		));
		$builder->add('duration', 'number', array(
			'label' => 'Duration:',
		));
		$builder->add('role', 'text', array(
			'label' => 'Role:',
		));
		$builder->add('duties', 'textarea', array(
			'label' => 'Duties:',
		));
		$builder->add('feedback_received', 'textarea', array(
			'label' => 'Feedback Received:',
		));
		$builder->add('reflection', 'textarea', array(
			'label' => 'Reflection:',
		));
		$builder->add('employer_phone_number', 'number', array(
			'label' => 'Employer Phone Number:',
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
			'data_class' => 'Corvus\AdminBundle\Entity\WorkHistory',
		);
	}

	public function getName()
	{
		return 'workHistory';
	}
}