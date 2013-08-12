<?php

// src/Corvus/AdminBundle/Form/Type/SkillsType.php

namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SkillsType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options )
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
		$builder->add('skill_name', 'text', array(
			'label' => 'Skill Name:',
			'attr' => array(
				'placeholder' => 'E.g PHP',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));

		$builder->add('competency', 'text', array(
			'label' => 'Competency:',
			'attr' => array(
				'placeholder' => 'E.g Average',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('years_experience', 'number', array(
			'label' => 'Years Experience:',
			'attr' => array(
				'placeholder' => 'E.g 5',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('description', 'textarea', array(
			'label' => 'Description:',
			'attr' => array(
				'placeholder' => 'E.g I have been using PHP for 5 years and really enjoy using it as a language and used it for my univesity project',
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
			'data_class' => 'Corvus\AdminBundle\Entity\Skills',
		);
	}

	public function getName()
	{
		return 'skills';
	}
}