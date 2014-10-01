<?php

// src/Corvus/AdminBundle/Form/Type/NavigationType.php
namespace Corvus\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\Config\FileLocator,
    Symfony\Component\Routing\Loader\YamlFileLoader,
    Symfony\Component\OptionsResolver\OptionsResolverInterface,
    
    Corvus\CoreBundle\Extension\PortfolioInfoRepository;


class NavigationType extends AbstractType
{
    private $portfolioInfoRepository;

    public function setPortfolioInfoRepository(PortfolioInfoRepository $portfolioInfoRepository)
    {
        $this->portfolioInfoRepository = $portfolioInfoRepository;
    }

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

    /**
     * Get all of the Route Paths for the FrontendBundle.
     * 
     * @return array
     */
	private function getRouteChoices()
	{
        // Load the Frontend Route Collection
        $routeCollection = $this->portfolioInfoRepository->loadRouteCollection();

        $routePatterns = array();
        
        foreach ($routeCollection as $route) {
            // Store the Pattern of each Route
            $routePatterns[$route->getPattern()] = $route->getPattern();
        }
        
        return $routePatterns;
	}
}