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
		));
		$builder->add('portfolio_subtitle', 'text', array(
			'label' => 'Porfolio Subtitle:',
		));
		$builder->add('display_subtitle', 'checkbox', array(
			'label' => 'Display Subtitle?',
		));
		$builder->add('logo', 'file', array(
			'label' => 'Logo:',
		));
		$builder->add('display_logo', 'checkbox', array(
			'label' => 'Display Logo?',
		));
		$builder->add('global_general_meta_title', 'text', array(
			'label' => 'Global General Meta Title:',
		));
		$builder->add('about_meta_title', 'text', array(
			'label' => 'About Meta Title:',
		));
		$builder->add('education_meta_title', 'text', array(
			'label' => 'Education Meta Title:',
		));
		$builder->add('work_history_meta_title', 'text', array(
			'label' => 'Work History Meta Title:',
		));
		$builder->add('project_history_meta_title', 'text', array(
			'label' => 'Project History Meta Title:',
		));
		$builder->add('global_work_history_meta_title', 'text', array(
			'label' => 'Global Work History Meta Title:',
		));
		$builder->add('global_project_history_meta_title', 'text', array(
			'label' => 'Global Project History Meta Title:',
		));
		$builder->add('analytics', 'text', array(
			'label' => 'Analytics Tracking ID:',
		));
		$builder->add('footer_text', 'textarea', array(
			'label' => 'Footer Text:'
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