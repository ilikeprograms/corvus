<?php

// src/Corvus/AdminBundle/Form/Type/NavigationType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;

class NavigationType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('navigation_order', 'number', array(
			'label' => 'Order:',
		));
		$builder->add('href', 'text', array(
			'label' => 'Href (Link address):',
		));
		$builder->add('title', 'text', array(
			'label' => 'Title:',
		));
		$builder->add('alt', 'text', array(
			'label' => 'Alternative Text:'
		));
		$builder->add('check', 'checkbox', array(
			'property_path' => false,
			'attr' => array(
				'class' => 'case',
		)));
		$builder->add('internalRoutes', 'choice', array(
			'choices' => $this->getRouteChoices(),
			'property_path' => false,
			'required' => false,
			'empty_data' => null,
		));
	}

	public function getDefaultOptions(array $options)
	{
		return array(
			'data_class' => 'Corvus\AdminBundle\Entity\Navigation',
		);
	}

	public function getName()
	{
		return 'navigation';
	}

	private function getRouteChoices()
	{
		$locator = new FileLocator(array(__DIR__));
        $loader = new YamlFileLoader($locator);
        $collection = $loader->load('../../../FrontendBundle/resources/config/routing.yml');
        
        $routeNames = [];

        foreach ($collection as $key => $value) {
            $routeNames[$value->getPattern()] = $value->getPattern();
        }

        return $routeNames;
	}
}