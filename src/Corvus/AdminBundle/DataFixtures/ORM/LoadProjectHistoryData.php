<?php

// src/Corvus/AdminBundle/DataFixtures/ORM/LoadProjectHistoryData.php
namespace Corvus\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager,
    Doctrine\Common\DataFixtures\FixtureInterface,

    Corvus\AdminBundle\Entity\ProjectHistory;


class LoadProjectHistoryData implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$projectHistory = new ProjectHistory();
		$projectHistory->setProjectName('Secretary Lucy\'s Fansite');
		$projectHistory->setProjectDescription('Creating and constantly looking at a fansite for the fantastic secretary lucy.');
		$projectHistory->setRole('Creator and administrator');
		$projectHistory->setProcess('Stalked her around the office for a while. Also took a few photos. Then created the amazing fansite');
		$projectHistory->setFeedbackReceived('Lucy says if she ever finds out who made the fansite she would hurt them :( #ForeverAlone');
		$projectHistory->setReflection('Probably shouldnt have shown lucy the website. Now she just thinks im weird!');
		$projectHistory->setUrl('http://www.lucyisthebest.com');
		$projectHistory->setMetaTitle('Secretary Lucys Fansite |');
		$projectHistory->setMetaDescription('Best website ever');

		$manager->persist($projectHistory);
		$manager->flush();
	}
}