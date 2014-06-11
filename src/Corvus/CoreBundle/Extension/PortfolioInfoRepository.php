<?php

// src/Corvus/CoreBundle/Extension/PortfolioInfoRepository.php
namespace Corvus\CoreBundle\Extension;

use Doctrine\Bundle\DoctrineBundle\Registry,

    Symfony\Component\Routing\Matcher\UrlMatcher,
    Symfony\Component\Routing\RequestContext,
    Symfony\Component\Config\FileLocator,
    Symfony\Component\Routing\Loader\YamlFileLoader,
    Symfony\Component\Routing\Exception\ResourceNotFoundException,
    Symfony\Component\Routing\Exception\RouteNotFoundException,
    Symfony\Component\HttpFoundation\RequestStack,
    Symfony\Component\Routing\Router;


class PortfolioInfoRepository
{
    protected $em;
    protected $router;
    protected $requestStack;
    protected $container;
    private $generalSettings;

    private static $navigationIcons = array(
        '/' => 'fa-home',
        '/ProjectHistory' => 'fa-rocket',
        '/Education' => 'fa-book',
        '/WorkHistory' => 'fa-briefcase',
        '/About' => 'fa-user'
    );

    /**
     * Sets the Entity Manager.
     * 
     * @param \Doctrine\Bundle\DoctrineBundle\Registry $entityManager
     */
    public function setEntityManager(Registry $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * Sets the RequestStack.
     * 
     * @param \Symfony\Component\HttpFoundation\RequestStack $requestStack
     */
    public function setRequestStack(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * Sets the Router.
     * 
     * @param \Symfony\Component\Routing\Router $router
     */
    public function setRouter(Router $router)
    {
        $this->router = $router;
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
        if (NULL === $this->generalSettings) {
            $this->generalSettings = $this->em->getRepository('CorvusAdminBundle:GeneralSettings')->Find(1);
        }

        return $this->generalSettings;
    }

    /**
     * Gets all of the Navigation Entities.
     * 
     * @return \Corvus\AdminBundle\Entity\Navigation[]
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
     * Echo's out the GoogleAnalytics tracking code script, if the field is set.
     */
    public function includeAnalyticsTracking()
    {
        $analytics = $this->getGeneralSettings()->getAnalytics();

        if ($analytics) {
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
     * Creates a set of Navigation items for each of the Navigation Entitys,
     * also adds an active class to the Active page and Displays Icons if specified.
     * 
     * @param boolean $displayIcons Displays Font awesome Icons if set to true, see top of class.
     */
    public function createNavigation($displayIcons = false)
    {
        $request = $this->requestStack->getCurrentRequest();

        // Get the current Environment and the appropriate index
        $env = $request->server->get('SCRIPT_NAME');
        
        $urlPrepend = $env === '/app.php' ? '' : $env;

        // Get any Paramaters in the Route of the Current page
        $routeId = $request->attributes->get('id');
        $route = $request->attributes->get('_route');

        // Find the Current route of the page, including any id params
        if ($routeId) {
            $currentRoute = $this->router->generate($route, array('id' => $routeId));
        } else {
            $currentRoute = $this->router->generate($route);
        }

        // Create a Navigation list item for each Navigation Entity in Corvus
        $navigation = $this->getNavigation();
        foreach ($navigation as $nav) {
            // The Navigation HREF including the current symfony env
            $localUrl = $urlPrepend . $nav->getHref();

            // Adds the Active class if the navigation being created is also the Current page
            $active = $currentRoute === $localUrl ? " class='active'" : "";

            // Start the List item, and add the active class if current page
            echo '<li' . $active . '>';

            // Store a refrence to all the Link variables we will use
            $navHref = $nav->getHref();
            $navTitle = $nav->getTitle();
            $navAlt = $nav->getAlt();

            // If icons should be displayed, and an Icon exists for this Navigation path
            if ($displayIcons && array_key_exists($navHref, self::$navigationIcons)) {
                // Create a Navigation item with the Icon
                $this->createNavItem($navHref, $navTitle, $navAlt, self::$navigationIcons[$navHref]);
            } else {
                // Create a Navigation item without an Icon
                $this->createNavItem($navHref, $navTitle, $navAlt);
            }			

            // Close the List item
            echo '</li>';
        }
    }

    /**
     * Creates a Navigation item out of the provided Inputs, there are a few ways in which the output
     * changes based on the context. If the Route provided is a Symfony path (e.g. CorvusAdminBundle_Homepage)
     * A list item will be created, otherwise all other $route's provided will create an anchor tag.
     * 
     * @param string $route Route to be used to create the Navigation item (expected to be either a Symfony name route, route pattern or an external url).
     * @param string $text Text to display in the Navigation item.
     * @param string $alt Alternative text for the link.
     * @param string $faicon The names of font awesome classes to used to create an icon to prepend before the text.
     * @param boolean $endItem To end the list item or not
     */
    public function createNavItem($route, $text, $alt, $faicon = null, $endItem = true)
    {
        $request = $this->requestStack->getCurrentRequest();

        // Load the RouteCollection and create a URL matcher, to match the
        // Navigation Entities in Corvus to the RouteCollection
        $routeCollection = $this->loadRouteCollection();
        $matcher = new UrlMatcher($routeCollection, new RequestContext());

        // The Route provided was a Symfony Route
        // So we know we want to create a List item from the Route
        // With a link to the Page
        try {
            // Attempt to generate a Route from the $route
            $path = $this->router->generate($route, array(), false);

            // If the Route provided is the Active route, add the Active class
            $active = $request->get('_route') === $route ? " class='active'" : "";

            // Create the List item with the URL path, Active class and Alt attribute
            $listItem = '<li ' . $active . '><a href="'.$path.'" alt="'.$alt.'">';

            // If an Icon is specified, append the Icon to the Anchor element
            if ($faicon !== null) {
                $listItem .= '<i class="fa '. $faicon .' fa-fw"></i>';
            }

            $listItem .= $text .'</a>';

            if ($endItem === true) {
                $listItem .= '</li>';
            }

            echo $listItem;

        // The Route is either an internal URL path, or an external link
        // So we just want to create an anchor tag
        } catch (RouteNotFoundException $e) {
            try {
                // Try to match the Route, if it matches, it must be the URL path to an internal route
                $parameters = $matcher->match($route);

                // The Symfony Route url
                $fullUrl = $this->router->generate($parameters['_route'], array(), true);

                echo '<a href="' . $fullUrl . '" alt="' . $alt . '">';

                // If a Fa icon name was provided, add a Fa icon
                if ($faicon !== null) {
                    echo '<i class="fa '. $faicon .'"></i> ';
                }

                echo $text . '</a>';
            } catch (ResourceNotFoundException $e) { // Must be an External link
                echo '<a href="' . $route . '" alt="' . $alt . '" target="_blank">' . $text . '</a>';
            }     
        }
    }

    /**
     * Creates a Navigation stack which has a list item which is the Group, with an
     * unordered list which represents the Sub navigation for the Navigation stack.
     * 
     * @param array $stack The details to use to create a Grouping Navigation item.
     * @param array $children Navigation item children to create as Sub Navigation.
     */
    public function createNavStack($stack, $children)
    {
        // Create a Grouping Navigation item
        $this->createNavItem($stack[0], $stack[1], $stack[2], $stack[3], false); // Provide false as last argument to not close the list item
        echo '<ul class="nav nav-pills nav-stacked">'; // Start Sub Navigation

        // Create a Navigation item for each child provided
        foreach ($children as $child) {
            $this->createNavItem($child[0], $child[1], $child[2], $child[3]);
        }

        echo '</ul>'; // End Sub Navigation
        echo '</li>'; // Close the Grouping item
    }

    /**
     * Loads the RouteCollection of Corvus.
     * 
     * @return array
     */
    private function loadRouteCollection()
    {
        $locator = new FileLocator(__DIR__.'/../../FrontendBundle/Resources/config');
        $loader = new YamlFileLoader($locator);

        return $loader->load('routing.yml');
    }
}