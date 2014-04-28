<?php

// src/Corvus/AdminBundle/Form/Type/ProjectHistoryTableViewType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ProjectHistoryTableViewType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('projectHistory', 'collection', array(
			'type' => new ProjectHistoryType(),
			'allow_delete' => true,
		));
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
			'data_class' => 'Corvus\AdminBundle\Entity\ProjectHistoryTableView',
		));
	}

	public function getName()
	{
		return 'projectHistoryTableView';
	}
}