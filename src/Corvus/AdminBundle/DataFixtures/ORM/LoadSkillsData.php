<?php

// src/Corvus/AdminBundle/DataFixtures/ORM/LoadSkillsData.php
namespace Corvus\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager,
    Doctrine\Common\DataFixtures\FixtureInterface,

    Corvus\AdminBundle\Entity\Skills;


class LoadSkillsData implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$skills = new Skills();
		$skills->setSkillName('Cooking');
		$skills->setCompetency('Master Chef!');
		$skills->setYearsExperience(17);
		$skills->setDescription('I make the best beans on toast in the world!');

		$manager->persist($skills);
		$manager->flush();
	}
}