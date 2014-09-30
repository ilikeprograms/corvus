<?php

// src/Corvus/AdminBundle/Form/Type/WorkHistoryType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\OptionsResolver\OptionsResolverInterface,
    Symfony\Component\Form\FormEvents,
    Symfony\Component\Form\FormEvent;


class WorkHistoryType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
        // Employer Fields
		$builder->add('employer_name', 'text', array(
			'label' => 'Employer Name',
			'attr' => array(
				'placeholder' => 'E.g Corvus Inc',
                'class' => 'form-control'
			),
		));
		$builder->add('employer_address', 'textarea', array(
			'label' => 'Employer Address',
			'attr' => array(
				'placeholder' => 'E.g 29 Corvus Street, Crvs',
                'class' => 'form-control'
			),
            'required' => false,
		));
        $builder->add('employer_phone_number', 'number', array(
			'label' => 'Employer Phone Number',
			'attr' => array(
				'placeholder' => 'E.g 01792 xxxxxx',
                'class' => 'form-control'
			),
            'required' => false,
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

        // Job details fields
		$builder->add('role', 'text', array(
			'label' => 'Role',
			'attr' => array(
				'placeholder' => 'E.g Web Developer',
                'class' => 'form-control'
			),
		));
		$builder->add('duties', 'textarea', array(
			'label' => 'Duties',
			'attr' => array(
				'placeholder' => 'E.g Designing, Consulting with Clients etc',
                'class' => 'form-control'
			),
            'required' => false,
		));
		$builder->add('feedback_received', 'textarea', array(
			'label' => 'Feedback Received',
			'attr' => array(
				'placeholder' => 'E.g My boss said I do a fantastic job',
                'class' => 'form-control'
			),
            'required' => false,
		));
		$builder->add('reflection', 'textarea', array(
			'label' => 'Reflection',
			'attr' => array(
				'placeholder' => 'E.g I loved working at Corvus Inc',
                'class' => 'form-control'
			),
            'required' => false,
		));
        $builder->add('is_published', 'checkbox', array(
            'required' => false,
        ));
        
        // Meta Fields
		$builder->add('meta_title', 'text', array(
			'label' => 'Meta Title',
			'attr' => array(
				'placeholder' => 'E.g Corvus Inc |',
                'class' => 'form-control'
			),
		));
		$builder->add('meta_description', 'textarea', array(
			'label' => 'Meta Description',
			'attr' => array(
				'placeholder' => 'E.g Case study about my time at Corvus Inc as a Web Developer',
                'class' => 'form-control'
			),
            'required' => false,
		));
		$builder->add('check', 'checkbox', array(
			'mapped' => false,
			'attr' => array(
				'class' => 'case',
			),
		));
        
        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {
            $workHistory = $event->getData();

            if (array_key_exists('is_current_position', $workHistory)) {
                if ($workHistory['is_current_position'] === '1') {
                    $workHistory['end_date'] = null;
                    $event->setData($workHistory);
                }
            }
        });
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
			'data_class' => 'Corvus\AdminBundle\Entity\WorkHistory',
		));
	}

	public function getName()
	{
		return 'workHistory';
	}
}