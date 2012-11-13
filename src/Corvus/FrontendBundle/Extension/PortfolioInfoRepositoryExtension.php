<?php

namespace Corvus\FrontendBundle\Extension;

use Corvus\FrontendBundle\Extension\GeneralSettings;

class PortfolioInfoRepositoryExtension extends \Twig_Extension
{
	protected $portfolioInfoRepository;

	public function __construct(PortfolioInfoRepository $portfolioInfoRepository) {
		$this->portfolioInfoRepository = $portfolioInfoRepository;
	}

	public function getGlobals() {
		return array(
			'portfolio_info' => $this->portfolioInfoRepository
			);
	}

	public function getName()
	{
		return 'portfolio_info';
	}
}