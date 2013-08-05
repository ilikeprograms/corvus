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
			'attr' => array(
				'placeholder' => 'E.g Corvus Inc',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('employer_address', 'textarea', array(
			'label' => 'Employer Address:',
			'attr' => array(
				'placeholder' => 'E.g 29 Corvus Street, Crvs',
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
		$builder->add('end_date', 'date', array(
			'label' => 'End Date:',
			'input' => 'datetime',
			'widget' => 'choice',
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('role', 'text', array(
			'label' => 'Role:',
			'attr' => array(
				'placeholder' => 'E.g Web Developer',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('duties', 'textarea', array(
			'label' => 'Duties:',
			'attr' => array(
				'placeholder' => 'E.g Designing, Consulting with Clients etc',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
            'required' => false,
		));
		$builder->add('feedback_received', 'textarea', array(
			'label' => 'Feedback Received:',
			'attr' => array(
				'placeholder' => 'E.g My boss said I do a fantastic job',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
            'required' => false,
		));
		$builder->add('reflection', 'textarea', array(
			'label' => 'Reflection:',
			'attr' => array(
				'placeholder' => 'E.g I loved working at Corvus Inc',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
            'required' => false,
		));
		$builder->add('employer_phone_number', 'number', array(
			'label' => 'Employer Phone Number:',
			'attr' => array(
				'placeholder' => 'E.g 01792 xxxxxx',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
            'required' => false,
		));
		$builder->add('meta_title', 'text', array(
			'label' => 'Meta Title:',
			'attr' => array(
				'placeholder' => 'E.g Corvus Inc |',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('meta_description', 'textarea', array(
			'label' => 'Meta Description:',
			'attr' => array(
				'placeholder' => 'E.g Case study about my time at Corvus Inc as a Web Developer',
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
			'data_class' => 'Corvus\AdminBundle\Entity\WorkHistory',
		);
	}

	public function getName()
	{
		return 'workHistory';
	}
}