<?php

// src/Corvus/AdminBundle/Form/Type/EducationType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EducationType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('education_institute', 'text', array(
			'label' => 'Education Institute:',
		));
		$builder->add('qualification', 'text', array(
			'label' => 'Qualification:',
		));
		$builder->add('start_date', 'date', array(
			'label' => 'Start Date:',
			'input' => 'datetime',
			'widget' => 'choice',
		));
		$builder->add('duration', 'number', array(
			'label' => 'Duration:',
		));
		$builder->add('result', 'text', array(
			'label' => 'Result:',
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
			'data_class' => 'Corvus\AdminBundle\Entity\Education',
		);
	}

	public function getName()
	{
		return 'education';
	}
}