<?php

// src/Corvus/AdminBundle/Form/Type/EducationType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\OptionsResolver\OptionsResolverInterface;


class EducationType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('education_institute', 'text', array(
			'label' => 'Education Institute',
			'attr' => array(
				'placeholder' => 'E.g Corvus University',
                'class' => 'form-control'
			),
		));
		$builder->add('qualification', 'text', array(
			'label' => 'Qualification',
			'attr' => array(
				'placeholder' => 'E.g. Web Development',
                'class' => 'form-control'
            ),
		));
		$builder->add('start_date', 'date', array(
			'label' => 'Start Date',
			'input' => 'datetime',
			'widget' => 'choice',           
		));
		$builder->add('duration', 'number', array(
			'label' => 'Duration',
			'attr' => array(
				'placeholder' => 'E.g 2',
                'class' => 'form-control'
			),
		));
		$builder->add('result', 'text', array(
			'label' => 'Result',
			'attr' => array(
				'placeholder' => 'E.g Honors Degree With a 1st',
                'class' => 'form-control'
			),
		));
		$builder->add('check', 'checkbox', array(
			'mapped' => false,
			'attr' => array(
				'class' => 'case',
			),
		));
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
			'data_class' => 'Corvus\AdminBundle\Entity\Education',
		));
	}

	public function getName()
	{
		return 'education';
	}
}