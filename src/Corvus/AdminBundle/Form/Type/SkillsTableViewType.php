<?php

// src/Corvus/AdminBundle/Form/Type/SkillsTableViewType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\OptionsResolver\OptionsResolverInterface;


class SkillsTableViewType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('skills', 'collection', array(
			'type' => new SkillsType(),
			'allow_delete' => true,
		));
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
			'data_class' => 'Corvus\AdminBundle\Entity\SkillsTableView',
		));
	}

	public function getName()
	{
		return 'skillsTableView';
	}
}