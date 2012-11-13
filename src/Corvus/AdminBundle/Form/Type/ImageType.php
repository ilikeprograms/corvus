<?php

// src/Corvus/AdminBundle/Form/Type/ImageType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ImageType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('image_title', 'text');
		$builder->add('description', 'text');
		$builder->add('file', 'file');
	}

	public function getDefaultOptions(array $options)
	{
		return array(
			'data_class' => 'Corvus\AdminBundle\Entity\Image',
		);
	}

	public function getName()
	{
		return 'image';
	}
}