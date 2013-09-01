<?php

// src/Corvus/AdminBundle/DataFixtures/ORM/LoadNavigationData.php
namespace Corvus\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager,
    Doctrine\Common\DataFixtures\FixtureInterface,

    Corvus\AdminBundle\Entity\Navigation;


class LoadNavigationData implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$home = new Navigation();
		$home->setRowOrder(1);
		$home->setHref('/');
		$home->setTitle('Home');
		$home->setAlt('Home Link');
		$manager->persist($home);

		$education = new Navigation();
		$education->setRowOrder(2);
		$education->setHref('/Education');
		$education->setTitle('Education');
		$education->setAlt('Education Link');
		$manager->persist($education);

		$workHistory = new Navigation();
		$workHistory->setRowOrder(3);
		$workHistory->setHref('/WorkHistory');
		$workHistory->setTitle('Work History');
		$workHistory->setAlt('Work History Link');
		$manager->persist($workHistory);

		$projectHistory = new Navigation();
		$projectHistory->setRowOrder(4);
		$projectHistory->setHref('/ProjectHistory');
		$projectHistory->setTitle('Project History');
		$projectHistory->setAlt('Project History Link');
		$manager->persist($projectHistory);

		$about = new Navigation();
		$about->setRowOrder(5);
		$about->setHref('/About');
		$about->setTitle('About');
		$about->setAlt('About Link');
		$manager->persist($about);

		$manager->flush();
	}
}