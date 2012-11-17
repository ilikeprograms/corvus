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
		// Find the current directory and split it into an array minus the /
		$pathArray = explode("/", __DIR__);
		// Unset the last 3 array items
		for ($i = 0; $i < 3; $i++)
		{
			unset($pathArray[count($pathArray) - 1]);
		}
		// Implode the array, new __DIR__ should be src/Corvus
		$path = implode("/", $pathArray);

		// Set the FileLocator directory to be src/Corvus/FrontendBundle/resources/config
		$locator = new FileLocator($path."/FrontendBundle/resources/config");
		$loader = new YamlFileLoader($locator);
		// Load the routing file
		$collection = $loader->load('routing.yml');

		$routeNames = array();

		// Retrieve the route information and put it in the array
		foreach ($collection as $key => $value) {
		    $routeNames[$value->getPattern()] = $value->getPattern();
		}

		// Return the array of route names
		return $routeNames;
	}
}