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

	public function getLogo()
	{
		echo '<img src="/uploads/logo.png" />';
	}

	public function includeAnalyticsTracking()
	{
		$analytics = $this->getGeneralSettings()->getAnalytics();
		
		if($analytics)
		{
			echo @"
			  <script type=\"text/javascript\">

				  var _gaq = _gaq || [];
				  _gaq.push(['_setAccount', '".$analytics."']);
				  _gaq.push(['_trackPageview']);

				  (function() {
				    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
				  })();

			</script>
			";
		}
	}

	public function createNavigation()
	{
		$navigation = $this->getNavigation();
		$locator = new FileLocator(__DIR__.'/../Resources/config');
		$loader = new YamlFileLoader($locator);
		$collection = $loader->load('routing.yml');

		$context = new RequestContext();
		$matcher = new UrlMatcher($collection, $context);
		$generator = new UrlGenerator($collection, $context);

		foreach ($navigation as $nav) {
			try {
				$parameters = $matcher->match($nav->getHref());
				$navStrings[] = $parameters['_route'];
				$url = $generator->generate($parameters['_route'], array());
				echo "<li><a href='".$url."' alt='".$nav->getAlt()."'>".$nav->getTitle()."</a></li>";
			} catch(ResourceNotFoundException $e) {
				echo "<li><a href='".$nav->getHref()."'' alt='".$nav->getAlt()."'' target='_blank'>".$nav->getTitle()."</a></li>";
			}
		}
	}
}