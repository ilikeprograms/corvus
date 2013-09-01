<?php

// src/Corvus/AdminBundle/DataFixtures/ORM/LoadGeneralSettingsData.php
namespace Corvus\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager,
    Doctrine\Common\DataFixtures\FixtureInterface,

    Corvus\AdminBundle\Entity\GeneralSettings;


class LoadGeneralSettingsData implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$generalSettings = new GeneralSettings();
		$generalSettings->setPortfolioTitle('My Portfolio');
		$generalSettings->setPortfolioSubtitle('Subtitle');
		$generalSettings->setDisplaySubtitle(true);
		$generalSettings->setDisplayLogo(false);
		$generalSettings->setGlobalGeneralMetaTitle('iLikePrograms');
		$generalSettings->setAboutMetaTitle('About | Thomas Coleman |');
		$generalSettings->setEducationMetaTitle('Education | BSc Web Development |');
                $generalSettings->setSkillsMetaTitle('Skills |');
		$generalSettings->setProjectHistoryMetaTitle('Project History |');
		$generalSettings->setWorkHistoryMetaTitle('Work History |');
		$generalSettings->setGlobalWorkHistoryMetaTitle('Work Case Study |');
		$generalSettings->setGlobalProjectHistoryMetaTitle('Project Case Study |');
                $generalSettings->setTemplateChoice('Default');
                $generalSettings->setThemeChoice('Default');

		$manager->persist($generalSettings);
		$manager->flush();
	}
}