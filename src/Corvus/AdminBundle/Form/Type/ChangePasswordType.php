<?php

// src/Corvus/AdminBundle/Form/Type/ChangePasswordType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface;


class ChangePasswordType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('current_password', 'password', array(
            'required' => false,
            'label' => 'Current Password:',
            'label_attr' => array(
            'class' => 'fontBold',
            ),
        ));
        $builder->add('new_password', 'password', array(
            'required' => false,
            'label' => 'New Password:',
            'label_attr' => array(
            'class' => 'fontBold',
        ),
        ));
        $builder->add('confirm_password', 'password', array(
            'required' => false,
            'label' => 'Confirm Password:',
            'label_attr' => array(
            'class' => 'fontBold',
            ),
        ));
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