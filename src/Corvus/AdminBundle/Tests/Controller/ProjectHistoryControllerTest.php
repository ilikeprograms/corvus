<?php

namespace Corvus\AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\DomCrawler\Field\InputFormField;

class ProjectHistoryControllerTest extends WebTestCase
{
	private $client;

	public function __construct()
	{
		$this->client = static::createClient(array(), array(
        	'HTTP_HOST' => 'corvus2',
        	'PHP_AUTH_USER' => 'admin',
        	'PHP_AUTH_PW' => 'password',
        ));
        $this->client->followRedirects(true);
	}

	public function testNewProjectHistory()
	{
		$errors = $this->ignoreAddProjectHistory();
		$this->assertLessThan(1, $errors->filter('html:contains("error")')->count());

		// Add two more project history to test the batch delete
		$this->ignoreAddProjectHistory();
		$this->ignoreAddProjectHistory();
	}

	private function ignoreAddProjectHistory()
	{
		// Create client and go to the New Project History page
		$client = $this->client;
		$crawler = $client->request('GET', '/Admin/ProjectHistory/New');
		
		$form = $crawler->selectButton('Submit')->form();

		$form['projectHistory[project_name]'] = 'Test Project';
		$form['projectHistory[project_description]'] = 'This is a test project and will be deleted';
		$form['projectHistory[role]'] = 'Tester';
		$form['projectHistory[process]'] = 'I tested things.';
		$form['projectHistory[feedback_received]'] = 'Best project ever';
		$form['projectHistory[reflection]'] = 'My favourite project';
		$form['projectHistory[url]'] = null;
		$form['projectHistory[meta_title]'] = 'Meta Title';
		$form['projectHistory[meta_description]'] = 'Meta Description';

		return $client->submit($form);
	}

	public function testEditProjectHistory()
	{
		// Create client and go to the project history management page
		$client = $this->client;
		$crawler = $client->request('GET', '/Admin/ProjectHistory');
		$projectName = $crawler->filter('table tbody tr')->last()->filter('td')->eq(1)->text();

		$link = $crawler->selectLink("Edit")->last()->link();
		$crawler = $client->click($link);

		// Check if the editing page can be reached from the edit button
		$this->assertEquals(1, $crawler->filter('h2:contains("Edit")')->count());

		$form = $crawler->selectButton('Submit')->form();
		$form['projectHistory[project_name]'] = 'Test Project 2';
		$errors = $client->submit($form);

		// Check if the edit form has any errors
		$this->assertLessThan(1, $errors->filter('html:contains("error")')->count());

		$editedProjectName = $errors->filter('table tbody tr')->last()->filter('td')->eq(1)->text();

		$this->assertNotEquals($projectName, $editedProjectName);
	}

	public function testDeleteSingleProjectHistory()
	{
		// Create client and go to the project history management page
		$client = $this->client;
		$crawler = $client->request('GET', '/Admin/ProjectHistory');

		$projectHistoryCount = $crawler->filter('table tbody tr')->count();
		
		$deleteLink = $crawler->selectLink("Delete")->last()->link();
		$crawler = $client->click($deleteLink);

		$newProjectHistoryCount = $crawler->filter('table tbody tr')->count();

		$this->assertNotEquals($projectHistoryCount, $newProjectHistoryCount);
	}

	public function testDeleteMultipleProjectHistory()
	{
		// Create client and go to the project history management page
		$client = $this->client;
		$crawler = $client->request('GET', '/Admin/ProjectHistory');
		$projectHistoryCount = $crawler->filter('table tbody tr')->count();
		$form = $crawler->selectButton('Go')->form();
		$form['projectHistoryTableView[projectHistory]['.($projectHistoryCount - 2).'][check]']->tick();
		$form['projectHistoryTableView[projectHistory]['.($projectHistoryCount - 1).'][check]']->tick();

		$crawler = $client->submit($form);

		$newProjectHistoryCount = $crawler->filter('table tbody tr')->count();

		$this->assertNotEquals($projectHistoryCount, $newProjectHistoryCount);
	}
}