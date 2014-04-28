<?php

// src/Corvus/AdminBundle/Form/Type/NavigationTableViewType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\OptionsResolver\OptionsResolverInterface;


class NavigationTableViewType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('navItems', 'collection', array(
			'type' => new NavigationType(),
			'allow_delete' => true,
		));
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
			'data_class' => 'Corvus\AdminBundle\Entity\NavigationTableView',
		));
	}

	public function getName()
	{
		return 'navigationTableView';
	}
}