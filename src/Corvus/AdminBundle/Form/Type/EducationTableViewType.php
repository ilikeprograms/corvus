<?php

// src/Corvus/AdminBundle/Form/Type/EducationTableViewType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\OptionsResolver\OptionsResolverInterface;


class EducationTableViewType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('education', 'collection', array(
			'type' => new EducationType(),
			'allow_delete' => true,
		));
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
			'data_class' => 'Corvus\AdminBundle\Entity\EducationTableView',
		));
	}

	public function getName()
	{
		return 'educationTableView';
	}
}