<?php

// src/Corvus/AdminBundle/Form/Type/WorkHistoryTableViewType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class WorkHistoryTableViewType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('workHistory', 'collection', array(
			'type' => new WorkHistoryType(),
			'allow_delete' => true,
		));
	}

	public function getDefaultOptions(array $options)
	{
		return array(
			'data_class' => 'Corvus\AdminBundle\Entity\WorkHistoryTableView',
		);
	}

	public function getName()
	{
		return 'workHistoryTableView';
	}
}