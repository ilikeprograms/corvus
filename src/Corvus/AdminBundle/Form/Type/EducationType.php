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
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('qualification', 'text', array(
			'label' => 'Qualification:',
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('start_date', 'date', array(
			'label' => 'Start Date:',
			'input' => 'datetime',
			'widget' => 'choice',
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('duration', 'number', array(
			'label' => 'Duration:',
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('result', 'text', array(
			'label' => 'Result:',
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
			'data_class' => 'Corvus\AdminBundle\Entity\Education',
		);
	}

	public function getName()
	{
		return 'education';
	}
}