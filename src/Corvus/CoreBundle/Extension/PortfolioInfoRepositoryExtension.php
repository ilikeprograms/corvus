<?php

// src/Corvus/CoreBundle/Extension/PortfolioInfoRepositoryExtension
namespace Corvus\CoreBundle\Extension;


class PortfolioInfoRepositoryExtension extends \Twig_Extension
{
    protected $portfolioInfoRepository;
    protected $alerts = array();

    /**
     * Sets the PortfolioInfoRepository.
     * 
     * @param \Corvus\FrontendBundle\Extension\PortfolioInfoRepository $portfolioInfoRepository
     */
    public function setPortfolioInfoRepository(PortfolioInfoRepository $portfolioInfoRepository)
    {
        $this->portfolioInfoRepository = $portfolioInfoRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function getGlobals()
    {
        return array(
            'portfolio_info' => $this->portfolioInfoRepository
        );
    }
    
    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            'setAlert' => new \Twig_function_method($this, 'setAlert'),
            'getAlert' => new \Twig_function_method($this, 'getAlert'),
        );
    }
    
    /**
     * Stores the Name of an Alert that has been set in the View, so we can make
     * sure we dont display duplicate alerts.
     * 
     * @param string $alertName Name of the alert that was displayed
     */
    public function setAlert($alertName)
    {
        array_push($this->alerts, $alertName);
    }
    
    /**
     * Checks if an alert with the Name provided has already been displayed.
     * 
     * @param string $alertName Name of the alert to check has been displayed
     * @return boolean
     */
    public function getAlert($alertName)
    {
        // Check the Alert has been displayed
        if (in_array($alertName, $this->alerts)) {
            return true;
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'portfolio_info';
    }
}