<?php

namespace Corvus\FrontendBundle\Extension;

use Doctrine\ORM\EntityManager;
//use Corvus\AdminBundle\Entity\GeneralSettings;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Generator\UrlGenerator;

class PortfolioInfoRepository
{
	protected $em;

	public function __construct(EntityManager $entityManager) {
		$this->em = $entityManager;
	}

	public function getGeneralSettings()
	{
		return $this->em->getRepository('CorvusAdminBundle:GeneralSettings')->Find(1);
	}

	private function getNavigation()
	{
		return $this->em->getRepository('CorvusAdminBundle:Navigation')
			->findBy(array(), array('navigation_order' => 'ASC'));
	}

	public function getAbout()
	{
		return $this->em->getRepository('CorvusAdminBundle:About')->Find(1);
	}

	public function createNavigation()
	{
		$navigation = $this->getNavigation();
		$locator = new FileLocator(__DIR__.'/../Resources/config');
		$loader = new YamlFileLoader($locator);
		$collection = $loader->load('routing.yml');

		$context = new RequestContext($_SERVER['SCRIPT_NAME']);
		$matcher = new UrlMatcher($collection, $context);
		$generator = new UrlGenerator($collection, $context);

		foreach ($navigation as $nav) {
			try {
				$parameters = $matcher->match($nav->getHref());
				$navStrings[] = $parameters['_route'];
				$url = $generator->generate($parameters['_route'], array());
				echo "<li><a href='".$url."' alt='".$nav->getAlt()."'>".$nav->getTitle()."</a></li>";
			} catch(ResourceNotFoundException $e) {
				echo "<li><a href='".$nav->getHref()."'' alt='".$nav->getAlt()."''>".$nav->getTitle()."</a></li>";
			}
		}
	}
}