<?php

// src/Corvus/AdminBundle/Form/Type/GeneralSettingsType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\OptionsResolver\OptionsResolverInterface;


class GeneralSettingsType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('portfolio_title', 'text', array(
            'label' => 'Portfolio Title',
            'attr' => array(
                'placeholder' => 'E.g My Portfolio',
                'class' => 'form-control'
            ),
        ));
        $builder->add('portfolio_subtitle', 'text', array(
            'required' => false,
            'label' => 'Porfolio Subtitle',
            'attr' => array(
                'placeholder' => 'E.g Best Portfolio Ever!',
                'class' => 'form-control'
            ),
        ));
        $builder->add('display_subtitle', 'checkbox', array(
            'required' => false,
            'label' => 'Display Subtitle?',
        ));
        $builder->add('logo', 'file', array(
            'mapped' => false,
            'required' => false,
            'label' => 'Logo',
        ));
        $builder->add('display_logo', 'checkbox', array(
            'required' => false,
            'label' => 'Display Logo?',
        ));
        $builder->add('global_general_meta_title', 'text', array(
            'label' => 'Global General Meta Title',
            'attr' => array(
                'placeholder' => 'My Portfolio Site',
                'class' => 'form-control'
            ),
        ));
        $builder->add('home_meta_title', 'text', array(
            'label' => 'Home Meta Title',
            'attr' => array(
                'placeholder' => 'Home |',
                'class' => 'form-control'
            ),
        ));
        $builder->add('about_meta_title', 'text', array(
            'label' => 'About Meta Title',
            'attr' => array(
                'placeholder' => 'About |',
                'class' => 'form-control'
            ),
        ));
        $builder->add('education_meta_title', 'text', array(
            'label' => 'Education Meta Title',
            'attr' => array(
                'placeholder' => 'Education |',
                'class' => 'form-control'
            ),
        ));
        $builder->add('skills_meta_title', 'text', array(
            'label' => 'Skills Meta Title',
            'attr' => array(
                'placeholder' => 'Skills |',
                'class' => 'form-control'
            ),
        ));
        $builder->add('work_history_meta_title', 'text', array(
            'label' => 'Work History Meta Title',
            'attr' => array(
                'placeholder' => 'Work History |',
                'class' => 'form-control'
            ),
        ));
        $builder->add('project_history_meta_title', 'text', array(
            'label' => 'Project History Meta Title',
            'attr' => array(
                'placeholder' => 'Project History |',
                'class' => 'form-control'
            ),
        ));
        $builder->add('global_work_history_meta_title', 'text', array(
            'label' => 'Global Work History Meta Title',
            'attr' => array(
                'placeholder' => 'Work Case Study |',
                'class' => 'form-control'
            ),
        ));
        $builder->add('global_project_history_meta_title', 'text', array(
            'label' => 'Global Project History Meta Title',
            'attr' => array(
                'placeholder' => 'Project Case Study |',
                'class' => 'form-control'
            ),
        ));
        $builder->add('footer_text', 'textarea', array(
            'required' => false,
            'label' => 'Footer Text:',
            'attr' => array(
                'placeholder' => 'E.g Copyright Me 2013. Powered by Corvus',
                'class' => 'form-control'
            ),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Corvus\AdminBundle\Entity\GeneralSettings',
        ));
    }

    public function getName()
    {
        return 'generalSettings';
    }
}