<?php

// src/Corvus/AdminBundle/DataFixtures/ORM/LoadNavigationData.php
namespace Corvus\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Corvus\AdminBundle\Entity\Navigation;

class LoadNavigationData implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$home = new navigation();
		$home->setNavigationOrder(1);
		$home->setHref('/');
		$home->setTitle('Home');
		$home->setAlt('Home Link');
		$manager->persist($home);

		$education = new navigation();
		$education->setNavigationOrder(2);
		$education->setHref('/Education');
		$education->setTitle('Education');
		$education->setAlt('Education Link');
		$manager->persist($education);

		$workHistory = new navigation();
		$workHistory->setNavigationOrder(3);
		$workHistory->setHref('/WorkHistory');
		$workHistory->setTitle('Work History');
		$workHistory->setAlt('Work History Link');
		$manager->persist($workHistory);

		$projectHistory = new navigation();
		$projectHistory->setNavigationOrder(4);
		$projectHistory->setHref('/ProjectHistory');
		$projectHistory->setTitle('Project History');
		$projectHistory->setAlt('Project History Link');
		$manager->persist($projectHistory);

		$about = new navigation();
		$about->setNavigationOrder(5);
		$about->setHref('/About');
		$about->setTitle('About');
		$about->setAlt('About Link');
		$manager->persist($about);

		$manager->flush();
	}
}