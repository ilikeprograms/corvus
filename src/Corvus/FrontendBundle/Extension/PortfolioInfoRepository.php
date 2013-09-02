<?php

// src/Corvus/FontendBundle/Extension/PortfolioInfoRepository.php
namespace Corvus\FrontendBundle\Extension;

use Doctrine\ORM\EntityManager,

    Symfony\Component\Routing\Matcher\UrlMatcher,
    Symfony\Component\Routing\RequestContext,
    Symfony\Component\Config\FileLocator,
    Symfony\Component\Routing\Loader\YamlFileLoader,
    Symfony\Component\Routing\Exception\ResourceNotFoundException,
    Symfony\Component\Routing\Generator\UrlGenerator;


class PortfolioInfoRepository
{
	protected $em;
        
        private $_generalSettings;

	public function __construct(EntityManager $entityManager) {
            $this->em = $entityManager;
	}

        /**
         * Gets the current Frontend ThemeChoice.
         * 
         * @return string
         */
	public function getThemeChoice()
	{
            return $this->getGeneralSettings()->getThemeChoice();
	}

        /**
         * Gets the current Frontend TemplateChoice.
         * 
         * @return string
         */
	public function getTemplateChoice()
	{
            return $this->getGeneralSettings()->getTemplateChoice();
	}

        /**
         * Finds the stored instance of GeneralSettinggs, or loads it if it doesnt exist.
         * 
         * @return \Corvus\AdminBundle\Entity\GeneralSettings
         */
	public function getGeneralSettings()
	{
            if (NULL === $this->_generalSettings) {
                $this->_generalSettings = $this->em->getRepository('CorvusAdminBundle:GeneralSettings')->Find(1);
            }
            
            return $this->_generalSettings;
	}

        /**
         * Gets all of the Navigation Entities.
         * 
         * @return array
         */
	private function getNavigation()
	{
            return $this->em->getRepository('CorvusAdminBundle:Navigation')->findAll();
	}

        /**
         * Gets the About Entity instance.
         * 
         * @return \Corvus\AdminBundle\Entity\About
         */
	public function getAbout()
	{
            return $this->em->getRepository('CorvusAdminBundle:About')->Find(1);
	}

        /**
         * Echo's out the Image tag containing the site logo.
         */
	public function includeLogo()
	{
            $path = $this->getGeneralSettings()->getPath();
        
            $portfolioTitle = $this->getGeneralSettings()->getPortfolioTitle();
            echo '<img src="/uploads/' . $path . '" alt="'.$portfolioTitle.' logo" />';
	}

        /**
         * Echo's out all of the stylesheets included in the frontend by default.
         */
	public function includeStylesheets()
	{
            $themeChoice = $this->getThemeChoice();
            echo @'
                <link href="/bundles/corvusfrontend/css/'.$themeChoice.'/design.css" rel="stylesheet" type="text/css" />
                <link href="/bundles/corvusfrontend/css/'.$themeChoice.'/layout.css" rel="stylesheet" type="text/css" />
                <link href="/bundles/corvusfrontend/css/'.$themeChoice.'/navigation.css" rel="stylesheet" type="text/css" />
                <link href="/bundles/corvusfrontend/css/'.$themeChoice.'/mobile.css" rel="stylesheet" type="text/css" />
                ';
	}

        /**
         * Echo's out the GoogleAnalytics tracking code script, if the field is set.
         */
	public function includeAnalyticsTracking()
	{
            if (($analytics = $this->getGeneralSettings()->getAnalytics())) {
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

        /**
         * Echo's out a list item for each Navigation Entity.
         */
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
                        $url = $generator->generate($parameters['_route'], array());
                        echo "<li><a href='".$url."' alt='".$nav->getAlt()."'>".$nav->getTitle()."</a></li>";
                } catch(ResourceNotFoundException $e) {
                        echo "<li><a href='".$nav->getHref()."'' alt='".$nav->getAlt()."'' target='_blank'>".$nav->getTitle()."</a></li>";
                }
            }
	}
}