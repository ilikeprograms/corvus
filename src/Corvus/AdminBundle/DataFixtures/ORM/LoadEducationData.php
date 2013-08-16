<?php

// src/Corvus/AdminBundle/DataFixtures/ORM/LoadEducationData.php
namespace Corvus\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager,
    Doctrine\Common\DataFixtures\FixtureInterface,

    Corvus\AdminBundle\Entity\Education;


class LoadEducationData implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$education = new Education();
		$education->setEducationInstitute('My First School');
		$education->setQualification('My First Qualification');
		$education->setStartDate(new \DateTime("now"));
		$education->setDuration('1');
		$education->setResult('Super Duper Passed');

		$manager->persist($education);
		$manager->flush();
	}
}