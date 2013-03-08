<?php

// src/Corvus/AdminBundle/Form/Type/ImageType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ImageType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('image_title', 'text', array(
			'attr' => array(
				'placeholder' => 'E.g. My Picture',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
        ));
		$builder->add('description', 'text', array(
			'attr' => array(
				'placeholder' => 'E.g A very nice picture',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
        ));
		$builder->add('file', 'file', array(
			'label_attr' => array(
                'class' => 'fontBold',
            ),
        ));
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