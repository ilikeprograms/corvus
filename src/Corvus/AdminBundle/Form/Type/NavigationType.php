<?php

// src/Corvus/AdminBundle/Form/Type/NavigationType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\Config\FileLocator,
    Symfony\Component\Routing\Loader\YamlFileLoader,
    Symfony\Component\OptionsResolver\OptionsResolverInterface;


class NavigationType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('href', 'text', array(
			'label' => 'Href (Link address)',
			'attr' => array(
				'placeholder' => 'E.g http://ilikeprograms.com',
                'class' => 'form-control'
			),
		));
		$builder->add('title', 'text', array(
			'label' => 'Title',
			'attr' => array(
				'placeholder' => 'E.g ilikeprograms',
                'class' => 'form-control'
			),
		));
		$builder->add('alt', 'text', array(
			'label' => 'Alternative Text',
			'attr' => array(
				'placeholder' => 'E.g ilikeprograms.com link',
                'class' => 'form-control'
			),
		));
		$builder->add('check', 'checkbox', array(
			'mapped' => false,
            'required' => false,
			'attr' => array(
				'class' => 'case',
			),
		));
		$builder->add('internalRoutes', 'choice', array(
			'choices' => $this->getRouteChoices(),
			'mapped' => false,
			'required' => false,
			'empty_data' => null,
            'attr' => array(
                'class' => 'form-control',
            )
		));
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
			'data_class' => 'Corvus\AdminBundle\Entity\Navigation',
		));
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
		$locator = new FileLocator($path."/FrontendBundle/Resources/config");
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