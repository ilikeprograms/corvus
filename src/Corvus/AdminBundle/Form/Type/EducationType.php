<?php

// src/Corvus/AdminBundle/Form/Type/EducationType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\OptionsResolver\OptionsResolverInterface,
    Symfony\Component\Form\FormEvents,
    Symfony\Component\Form\FormEvent;


class EducationType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('education_institute', 'text', array(
			'label' => 'Education Institute',
			'attr' => array(
				'placeholder' => 'E.g Corvus University',
                'class' => 'form-control'
			),
		));
		$builder->add('qualification', 'text', array(
			'label' => 'Qualification',
			'attr' => array(
				'placeholder' => 'E.g. Web Development',
                'class' => 'form-control'
            ),
		));
        
        // Date/Current position fields
		$builder->add('start_date', 'date', array(
			'label' => 'Start Date',
			'input' => 'datetime',
			'widget' => 'choice',
		));
		$builder->add('end_date', 'date', array(
			'label' => 'End Date',
			'input' => 'datetime',
			'widget' => 'choice',
            'required' => false,
		));
        $builder->add('is_current_position', 'checkbox', array(
            'required' => false
        ));

		$builder->add('result', 'text', array(
			'label' => 'Result',
			'attr' => array(
				'placeholder' => 'E.g Honors Degree With a 1st',
                'class' => 'form-control'
			),
		));
		$builder->add('check', 'checkbox', array(
			'mapped' => false,
			'attr' => array(
				'class' => 'case',
			),
		));
        
        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {
            $education = $event->getData();

            if (array_key_exists('is_current_position', $education)) {
                if ($education['is_current_position'] === '1') {
                    $education['end_date'] = null;
                    $event->setData($education);
                }
            }
        });
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
			'data_class' => 'Corvus\AdminBundle\Entity\Education',
		));
	}

	public function getName()
	{
		return 'education';
	}
}