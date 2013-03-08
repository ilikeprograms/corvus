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
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('employer_address', 'textarea', array(
			'label' => 'Employer Address:',
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
		$builder->add('role', 'text', array(
			'label' => 'Role:',
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('duties', 'textarea', array(
			'label' => 'Duties:',
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
		$builder->add('employer_phone_number', 'number', array(
			'label' => 'Employer Phone Number:',
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
			'data_class' => 'Corvus\AdminBundle\Entity\WorkHistory',
		);
	}

	public function getName()
	{
		return 'workHistory';
	}
}