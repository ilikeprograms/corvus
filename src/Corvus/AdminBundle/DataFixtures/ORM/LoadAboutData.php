<?php

// src/Corvus/AdminBundle/DataFixtures/ORM/LoadAboutData.php
namespace Corvus\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager,
    Doctrine\Common\DataFixtures\FixtureInterface,

    Corvus\AdminBundle\Entity\About;


class LoadAboutData implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$about = new About();
		$about->setFirstname('Mr Admin');
		$about->setLastname('Pants');
		$about->setAge(99);
		$about->setBio('Mostly spend my time being a fantastic awesome admin!');
		$about->setAddress('Moonbase');
		$about->setLocation('The moon!');
		$about->setEmailAddress('adminpants@adminpants.com');

		$manager->persist($about);
		$manager->flush();
	}
}