<?php

// src/Corvus/AdminBundle/Form/Type/SkillsType.php

namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SkillsType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options )
	{
		$builder->add('skill_name', 'text', array(
			'label' => 'Skill Name:',
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));

		$builder->add('competency', 'text', array(
			'label' => 'Competency:',
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('years_experience', 'number', array(
			'label' => 'Years Experience:',
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('description', 'textarea', array(
			'label' => 'Description:',
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
			'data_class' => 'Corvus\AdminBundle\Entity\Skills',
		);
	}

	public function getName()
	{
		return 'skills';
	}
}