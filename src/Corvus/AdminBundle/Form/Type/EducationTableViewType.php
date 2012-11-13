<?php

// src/Corvus/AdminBundle/Form/Type/EducationTableViewType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EducationTableViewType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('education', 'collection', array(
			'type' => new EducationType(),
			'allow_delete' => true,
		));
	}

	public function getDefaultOptions(array $options)
	{
		return array(
			'data_class' => 'Corvus\AdminBundle\Entity\EducationTableView',
		);
	}

	public function getName()
	{
		return 'educationTableView';
	}
}