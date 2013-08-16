<?php

// src/Corvus/AdminBundle/DataFixtures/ORM/LoadWorkHistoryData.php
namespace Corvus\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager,
    Doctrine\Common\DataFixtures\FixtureInterface,

    Corvus\AdminBundle\Entity\WorkHistory;


class LoadWorkHistoryData implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$workHistory = new WorkHistory();
		$workHistory->setEmployerName('Grumpy Pants Co');
		$workHistory->setEmployerAddress('01 Dark Side of the Moon');
		$workHistory->setStartDate(new \DateTime('01/01/0001'));
		$workHistory->setDuration(5);
		$workHistory->setRole('Pants Maker');
		$workHistory->setDuties('Making pants for people to wear. Hanging around the water cooler. Staring at the secretary.');
		$workHistory->setFeedbackReceived('Badass at makings pants. Banned from talking to the secretary :(');
		$workHistory->setReflection('In retrospect, I needed to be more sneaky while staring at the secretary.');
		$workHistory->setEmployerPhoneNumber(1111111);
		$workHistory->setMetaTitle('Grumpy Pants Co');
		$workHistory->setMetaDescription('Best company ever');

		$manager->persist($workHistory);
		$manager->flush();
	}
}