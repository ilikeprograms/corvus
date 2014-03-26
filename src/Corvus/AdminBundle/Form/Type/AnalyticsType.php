<?php

// src/Corvus/AdminBundle/Form/Type/AboutType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
	Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AnalyticsType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('analytics', 'text', array(
            'required' => false,
            'label' => 'Analytics Tracking ID',
            'attr' => array(
				'class' => 'form-control',
                'placeholder' => 'UA-XXXXX-Y',
            )
        ));
	}

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Corvus\AdminBundle\Entity\GeneralSettings',
        ));
    }

	public function getName()
	{
		return 'analytics';
	}
}
