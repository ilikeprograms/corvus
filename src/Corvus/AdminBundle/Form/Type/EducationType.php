<?php

// src/Corvus/AdminBundle/Form/Type/EducationType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface;


class EducationType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('row_order', 'number', array(
			'label' => 'Order:',
			'attr' => array(
				'placeholder' => 'E.g 1',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('education_institute', 'text', array(
			'label' => 'Education Institute:',
			'attr' => array(
				'placeholder' => 'E.g Corvus University',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('qualification', 'text', array(
			'label' => 'Qualification:',
			'attr' => array(
				'placeholder' => 'E.g. Web Development',
			),
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
			'attr' => array(
				'placeholder' => 'E.g 2',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('result', 'text', array(
			'label' => 'Result:',
			'attr' => array(
				'placeholder' => 'E.g Honors Degree With a 1st',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
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
			'data_class' => 'Corvus\AdminBundle\Entity\Education',
		);
	}

	public function getName()
	{
		return 'education';
	}
}