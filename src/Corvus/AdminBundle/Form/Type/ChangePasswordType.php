<?php

// src/Corvus/AdminBundle/Form/Type/ChangePasswordType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ChangePasswordType extends AbstractType {

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('current_password', 'password');
		$builder->add('new_password', 'password');
		$builder->add('confirm_password', 'password');
	}

	public function getDefaultOptions(array $options)
	{
		return array(
			'data_class' => 'Corvus\AdminBundle\Model\ChangePasswordModel',
		);
	}

	public function getName()
	{
		return 'changePassword';
	}
}