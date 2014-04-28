<?php

namespace Corvus\AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SkillsControllerTest extends WebTestCase
{
	private $client;

    public function testIndex()
    {
        
    }
//	public function __construct()
//	{
//		$this->client = static::createClient(array(), array(
//        	'HTTP_HOST' => 'corvus2',
//        	'PHP_AUTH_USER' => 'admin',
//        	'PHP_AUTH_PW' => 'password',
//        ));
//        $this->client->followRedirects(true);
//	}
//
//	public function testNewSkill()
//	{
//		$errors = $this->ignoreAddSkill();
//		$this->assertLessThan(1, $errors->filter('html:contains("error")')->count());
//
//		// Add two more skill to test the batch delete
//		$this->ignoreAddSkill();
//		$this->ignoreAddSkill();
//	}
//
//	private function ignoreAddSkill()
//	{
//		// Create client and go to the New Skills page
//		$client = $this->client;
//		$crawler = $client->request('GET', '/Admin/Skills/New');
//
//		$form = $crawler->selectButton('Submit')->form(array(
//			'skills[skill_name]' => 'Test Skill',
//			'skills[competency]' => 'Fantastic',
//			'skills[years_experience]' => 5,
//			'skills[description]' => 'This is a test skill',
//		));
//
//		return $client->submit($form);
//	}
//
//	public function testEditSkill()
//	{
//		// Create client and go to the skills management page
//		$client = $this->client;
//		$crawler = $client->request('GET', '/Admin/Skills');
//		$skillName = $crawler->filter('table tr')->last()->filter('td')->eq(1)->text();
//
//		$link = $crawler->selectLink("Edit")->last()->link();
//		$crawler = $client->click($link);
//
//		// Check if the editing page can be reached from the edit button
//		$this->assertEquals(1, $crawler->filter('h2:contains("Editing")')->count());
//
//		$form = $crawler->selectButton('Submit')->form();
//		$form['skills[skill_name]'] = 'Test skill 2';
//		$errors = $client->submit($form);
//		// Check if the edit form has any errors
//		$this->assertLessThan(1, $errors->filter('html:contains("error")')->count());
//
//		$editedSkillName = $errors->filter('table tr')->last()->filter('td')->eq(1)->text();
//
//		$this->assertNotEquals($skillName, $editedSkillName);
//	}
//
//	public function testDeleteSingleSkill()
//	{
//		// Create client and go to the skills management page
//		$client = $this->client;
//		$crawler = $client->request('GET', '/Admin/Skills');
//
//		$skillCount = $crawler->filter('table tbody tr')->count();
//
//		$deleteLink = $crawler->selectLink("Delete")->last()->link();
//		$crawler = $client->click($deleteLink);
//
//		$newSkillCount = $crawler->filter('table tbody tr')->count();
//
//		$this->assertNotEquals($skillCount, $newSkillCount);
//	}
//
//	public function testDeleteMultipleSkills()
//	{
//		// Create client and go to the skills management page
//		$client = $this->client;
//		$crawler = $client->request('GET', '/Admin/Skills');
//		$skillCount = $crawler->filter('table tbody tr')->count();
//		$form = $crawler->selectButton('Go')->form();
//		$form['skillsTableView[skills]['.($skillCount - 2).'][check]']->tick();
//		$form['skillsTableView[skills]['.($skillCount - 1).'][check]']->tick();
//
//		$crawler = $client->submit($form);
//
//		$newSkillCount = $crawler->filter('table tbody tr')->count();
//
//		$this->assertNotEquals($skillCount, $newSkillCount);
//	}
}