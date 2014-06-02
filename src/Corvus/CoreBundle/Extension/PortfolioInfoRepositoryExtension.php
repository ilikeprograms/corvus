<?php

// src/Corvus/CoreBundle/Extension/PortfolioInfoRepositoryExtension
namespace Corvus\CoreBundle\Extension;


class PortfolioInfoRepositoryExtension extends \Twig_Extension
{
    protected $portfolioInfoRepository;

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
    public function getName()
    {
        return 'portfolio_info';
    }
}