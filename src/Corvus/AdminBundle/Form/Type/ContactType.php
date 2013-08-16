<?php

// src/Corvus/AdminBundle/Form/Type/ContactType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface;


class ContactType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('name', 'text', array(
			'label' => 'Name:',
		));
        $builder->add('email', 'email', array(
        	'label' => 'Email:',
        ));
        $builder->add('subject', 'text', array(
        	'label' => 'Subject:',
        ));
        $builder->add('body', 'textarea', array(
        	'label' => 'Message:',
        ));
	}

	public function getName()
	{
		return 'contact';
	}
}