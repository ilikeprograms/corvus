<?php

// src/Corvus/AdminBundle/Form/Type/AboutType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\OptionsResolver\OptionsResolverInterface;


class AboutType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
	 	$builder->add('firstname', 'text', array(
            'label' => 'Firstname',
            'attr' => array(
                'placeholder' => 'E.g John',
                'class' => 'form-control'
            )
        ));
        $builder->add('lastname', 'text', array(
            'label' => 'Lastname',
            'attr' => array(
                'placeholder' => 'E.g Doe',
                'class' => 'form-control'
            )
        ));
        $builder->add('age', 'number', array(
            'label' => 'Age',
            'attr' => array(
                'placeholder' => 'E.g 21',
                'class' => 'form-control'
            )
        ));
        $builder->add('bio', 'textarea', array(
            'label' => 'Bio',
            'attr' => array(
                'placeholder' => 'E.g My name is John Doe and I come from a lovely small town.',
                'class' => 'form-control'
            )
        ));
        $builder->add('address', 'textarea', array(
            'label' => 'Address',
            'attr' => array(
                'placeholder' => 'E.g 20 Corvus Road, Crow City, Crowland',
                'class' => 'form-control'
            ),
            'required' => false,
        ));
        $builder->add('location', 'text', array(
            'label' => 'Location',
            'attr' => array(
                'placeholder' => 'E.g Crowcity',
                'class' => 'form-control'
            ),
            'required' => false,
        ));
        $builder->add('interests_hobbies', 'textarea', array(
            'label' => 'Interests/Hobbies',
            'attr' => array(
                'placeholder' => 'E.g I love programming and going for walks',
                'class' => 'form-control'
            ),
            'required' => false,
        ));
        $builder->add('email_address', 'email', array(
            'label' => 'Email Address',
            'attr' => array(
                'placeholder' => 'E.g johndoe@crowland.com',
                'class' => 'form-control'
            )
        ));
        $builder->add('twitter', 'text', array(
            'label' => 'Twitter',
            'attr' => array(
                'placeholder' => 'E.g @xxxxx',
                'class' => 'form-control'
            ),
            'required' => false,
        ));
        $builder->add('facebook', 'text', array(
            'label' => 'Facebook',
            'attr' => array(
                'placeholder' => 'E.g johndoe.1',
                'class' => 'form-control'
            ),
            'required' => false,
        ));
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'Corvus\AdminBundle\Entity\About',
		));
	}

	public function getName()
	{
		return 'about';
	}
}