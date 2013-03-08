<?php

// src/Corvus/AdminBundle/Form/Type/AboutType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AboutType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
	 	$builder->add('firstname', 'text', array(
            'label' => 'Firstname:',
            'attr' => array(
                'placeholder' => 'E.g John',
            ),
            'label_attr' => array(
                'class' => 'fontBold',
            ),
        ));
        $builder->add('lastname', 'text', array(
            'label' => 'Lastname:',
            'attr' => array(
                'placeholder' => 'E.g Doe',
            ),
            'label_attr' => array(
                'class' => 'fontBold',
            ),
        ));
        $builder->add('age', 'number', array(
            'label' => 'Age:',
            'attr' => array(
                'placeholder' => 'E.g 21',
            ),
            'label_attr' => array(
                'class' => 'fontBold',
            ),
        ));
        $builder->add('bio', 'textarea', array(
            'label' => 'Bio:',
            'attr' => array(
                'placeholder' => 'E.g My name is John Doe and I come from a lovely small town.',
            ),
            'label_attr' => array(
                'class' => 'fontBold',
            ),
        ));
        $builder->add('address', 'textarea', array(
            'label' => 'Address:',
            'attr' => array(
                'placeholder' => 'E.g 20 Corvus Road, Crow City, Crowland',
            ),
            'label_attr' => array(
                'class' => 'fontBold',
            ),
        ));
        $builder->add('location', 'text', array(
            'label' => 'Location:',
            'attr' => array(
                'placeholder' => 'E.g Crowcity',
            ),
            'label_attr' => array(
                'class' => 'fontBold',
            ),
        ));
        $builder->add('interests_hobbies', 'textarea', array(
            'label' => 'Interests/Hobbies:',
            'attr' => array(
                'placeholder' => 'E.g I love programming and going for walks',
            ),
            'label_attr' => array(
                'class' => 'fontBold',
            ),
        ));
        $builder->add('email_address', 'email', array(
            'label' => 'Email Address:',
            'attr' => array(
                'placeholder' => 'E.g johndoe@crowland.com',
            ),
            'label_attr' => array(
                'class' => 'fontBold',
            ),
        ));
        $builder->add('twitter', 'text', array(
            'label' => 'Twitter:',
            'attr' => array(
                'placeholder' => 'E.g @xxxxx',
            ),
            'label_attr' => array(
                'class' => 'fontBold',
            ),
        ));
        $builder->add('facebook', 'text', array(
            'label' => 'Facebook:',
            'attr' => array(
                'placeholder' => 'E.g johndoe.1',
            ),
            'label_attr' => array(
                'class' => 'fontBold',
            ),
        ));
	}

	public function getDefaultOptions(array $options)
	{
		return array(
			'data_class' => 'Corvus\AdminBundle\Entity\About',
		);
	}

	public function getName()
	{
		return 'about';
	}
}