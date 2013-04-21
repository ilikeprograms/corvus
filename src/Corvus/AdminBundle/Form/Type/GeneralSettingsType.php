<?php

// src/Corvus/AdminBundle/Form/Type/GeneralSettingsType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class GeneralSettingsType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('portfolio_title', 'text', array(
			'label' => 'Portfolio Title:',
			'attr' => array(
				'placeholder' => 'E.g My Portfolio',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('portfolio_subtitle', 'text', array(
			'label' => 'Porfolio Subtitle:',
			'attr' => array(
				'placeholder' => 'E.g Best Portfolio Ever!',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('display_subtitle', 'checkbox', array(
			'label' => 'Display Subtitle?',
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('logo', 'file', array(
			'label' => 'Logo:',
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('display_logo', 'checkbox', array(
			'label' => 'Display Logo?',
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('global_general_meta_title', 'text', array(
			'label' => 'Global General Meta Title:',
			'attr' => array(
				'placeholder' => 'My Portfolio Site',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('about_meta_title', 'text', array(
			'label' => 'About Meta Title:',
			'attr' => array(
				'placeholder' => 'About |',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('education_meta_title', 'text', array(
			'label' => 'Education Meta Title:',
			'attr' => array(
				'placeholder' => 'Education |',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('skills_meta_title', 'text', array(
			'label' => 'Skills Meta Title:',
			'attr' => array(
				'placeholder' => 'Skills |',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('work_history_meta_title', 'text', array(
			'label' => 'Work History Meta Title:',
			'attr' => array(
				'placeholder' => 'Work History |',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('project_history_meta_title', 'text', array(
			'label' => 'Project History Meta Title:',
			'attr' => array(
				'placeholder' => 'Project History |',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('global_work_history_meta_title', 'text', array(
			'label' => 'Global Work History Meta Title:',
			'attr' => array(
				'placeholder' => 'Work Case Study |',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('global_project_history_meta_title', 'text', array(
			'label' => 'Global Project History Meta Title:',
			'attr' => array(
				'placeholder' => 'Project Case Study |',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('analytics', 'text', array(
			'label' => 'Analytics Tracking ID:',
			'attr' => array(
				'placeholder' => 'UA-XXXXX-Y',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
            'required' => false,
		));
		$builder->add('footer_text', 'textarea', array(
			'label' => 'Footer Text:',
			'attr' => array(
				'placeholder' => 'E.g Copyright Me 2013. Powered by Corvus',
			),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('template_choice', 'choice', array(
			'label' => 'Template Choice:',
			'choices'   => array('Default' => 'Default', 'NavTop' => 'NavTop'),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
		$builder->add('theme_choice', 'choice', array(
			'label' => 'Theme Choice:',
			'choices'   => array('Default' => 'Default', 'NavTop' => 'NavTop'),
			'label_attr' => array(
                'class' => 'fontBold',
            ),
		));
	}

	public function getDefaultOptions(array $options)
	{
		return array(
			'data_class' => 'Corvus\AdminBundle\Entity\GeneralSettings',
		);
	}

	public function getName()
	{
		return 'generalSettings';
	}
}