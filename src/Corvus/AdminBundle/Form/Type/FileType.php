<?php

// src/Corvus/AdminBundle/Form/Type/FileType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface;


class FileType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('file_title', 'text', array(
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
			'data_class' => 'Corvus\AdminBundle\Entity\File',
		);
	}

	public function getName()
	{
		return 'file';
	}
}