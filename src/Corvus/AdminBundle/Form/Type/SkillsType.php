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
		));

		$builder->add('competency', 'text', array(
			'label' => 'Competency:',
		));
		$builder->add('years_experience', 'number', array(
			'label' => 'Years Experience:',
		));
		$builder->add('description', 'textarea', array(
			'label' => 'Description:',
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
			'data_class' => 'Corvus\AdminBundle\Entity\Skills',
		);
	}

	public function getName()
	{
		return 'skills';
	}
}