<?php

// src/Corvus/AdminBundle/Form/Type/NavigationTableViewType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class NavigationTableViewType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('navItems', 'collection', array(
			'type' => new NavigationType(),
			'allow_delete' => true,
		));
	}

	public function getDefaultOptions(array $options)
	{
		return array(
			'data_class' => 'Corvus\AdminBundle\Entity\NavigationTableView',
		);
	}

	public function getName()
	{
		return 'navigationTableView';
	}
}