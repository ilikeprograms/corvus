<?php

// src/Corvus/AdminBundle/Form/Type/SkillsType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\OptionsResolver\OptionsResolverInterface;


class SkillsType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options )
	{
		$builder->add('skill_name', 'text', array(
			'label' => 'Skill Name',
			'attr' => array(
				'placeholder' => 'E.g PHP',
                'class' => 'form-control'
			),
		));
		$builder->add('competency', 'text', array(
			'label' => 'Competency',
			'attr' => array(
				'placeholder' => 'E.g Average',
                'class' => 'form-control'
			),
            'required' => false,
		));
		$builder->add('years_experience', 'number', array(
			'label' => 'Years Experience',
			'attr' => array(
				'placeholder' => 'E.g 5',
                'class' => 'form-control'
			),
            'required' => false,
		));
		$builder->add('description', 'textarea', array(
			'label' => 'Description',
			'attr' => array(
				'placeholder' => 'E.g I have been using PHP for 5 years and really enjoy using it as a language and used it for my university project',
                'class' => 'form-control'
			),
            'required' => false,
		));
        $builder->add('can_display_skill', 'checkbox', array(
            'label' => 'Display full Skill details?',
            'required' => false,
        ));
        $builder->add('is_quick_skill', 'checkbox', array(
            'label' => 'Display in Quick Skills?',
            'required' => false,
        ));
		$builder->add('check', 'checkbox', array(
            'required' => false,
			'mapped' => false,
			'attr' => array(
				'class' => 'case',
			),
		));
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
			'data_class' => 'Corvus\AdminBundle\Entity\Skills',
		));
	}

	public function getName()
	{
		return 'skills';
	}
}