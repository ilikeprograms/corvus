<?php

// src/Corvus/AdminBundle/Form/Type/WorkHistoryTableViewType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\OptionsResolver\OptionsResolverInterface;



class WorkHistoryTableViewType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('workHistory', 'collection', array(
			'type' => new WorkHistoryType(),
			'allow_delete' => true,
		));
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
			'data_class' => 'Corvus\AdminBundle\Entity\WorkHistoryTableView',
		));
	}

	public function getName()
	{
		return 'workHistoryTableView';
	}
}