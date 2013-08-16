<?php

// src/Corvus/AdminBundle/Form/Type/SkillsTableViewType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface;


class SkillsTableViewType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('skills', 'collection', array(
			'type' => new SkillsType(),
			'allow_delete' => true,
		));
	}

	public function getDefaultOptions(array $options)
	{
		return array(
			'data_class' => 'Corvus\AdminBundle\Entity\SkillsTableView',
		);
	}

	public function getName()
	{
		return 'skillsTableView';
	}
}