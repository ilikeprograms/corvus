<?php

// src/Corvus/AdminBundle/Form/Type/ChangePasswordType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\Security\Core\Validator\Constraints\UserPassword,
    Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('currentPassword', 'password', array(
            'required' => true,
            'label' => 'Current Password',
            'attr' => array('class' => 'form-control'),
            'mapped' => false,
            'constraints' => new UserPassword(),
        ));
        $builder->add('plainPassword', 'repeated', array(
            'required' => true,
            'type' => 'password',
            'first_options' => array(
                'label' => 'New Password',
                'attr' => array('class' => 'form-control')
            ),
            'second_options' => array(
                'label' => 'Confirm New Password',
                'attr' => array('class' => 'form-control')
            )
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Corvus\AdminBundle\Entity\User',
        ));
    }

    public function getName()
    {
        return 'changePassword';
    }
}