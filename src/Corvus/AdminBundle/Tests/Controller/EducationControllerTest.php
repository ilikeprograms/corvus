<?php

namespace Corvus\AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EducationControllerTest extends WebTestCase
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

	public function testNewEducation()
	{
		// Add an education and return the crawler response
		$errors = $this->ignoreAddEducation();
		// Check if there were any errors
		$this->assertLessThan(1, $errors->filter('html:contains("error")')->count());

		// Add two more education to test the batch delete
		$this->ignoreAddEducation();
		$this->ignoreAddEducation();
	}

	private function ignoreAddEducation()
	{
		// Create client and go to the New Education page
		$client = $this->client;
		$crawler = $client->request('GET', '/Admin/Education/New');

		// Select the form and fill in the form details
		$form = $crawler->selectButton('Submit')->form(array(
			'education[education_institute]' => 'My First School',
			'education[qualification]' => 'My first Qualification',
			'education[start_date]' => array(
				'year' => 2007,
				'month' => 1,
				'day' => 1,
			),
			'education[duration]' => 1,
			'education[result]' => 'dsadsa',
		));

		// Submit the form and return the crawler results
		return $client->submit($form);
	}

	public function testEditEducation()
	{
		// Create client and go to the education management page
		$client = $this->client;
		$crawler = $client->request('GET', '/Admin/Education');
		$educationInstitute = $crawler->filter('table tr')->last()->filter('td')->eq(1)->text();

		$link = $crawler->selectLink("Edit")->last()->link();
		$crawler = $client->click($link);

		// Check if the editing page can be reached from the edit button
		$this->assertEquals(1, $crawler->filter('h2:contains("Editing")')->count());

		$form = $crawler->selectButton('Submit')->form();
		$form['education[education_institute]'] = 'My Second School';
		$errors = $client->submit($form);
		// Check if the edit form has any errors
		$this->assertLessThan(1, $errors->filter('html:contains("error")')->count());

		$editedEducationInstitute = $errors->filter('table tr')->last()->filter('td')->eq(1)->text();

		$this->assertNotEquals($educationInstitute, $editedEducationInstitute);
	}

	public function testDeleteSingleEducation()
	{
		// Create client and go to the education management page
		$client = $this->client;
		$crawler = $client->request('GET', '/Admin/Education');
		$educationCount = $crawler->filter('table tbody tr')->count();

		$deleteLink = $crawler->selectLink("Delete")->last()->link();
		$crawler = $client->click($deleteLink);

		$newEducationCount = $crawler->filter('table tbody tr')->count();

		$this->assertNotEquals($educationCount, $newEducationCount);
	}

	public function testDeleteMultipleEducation()
	{
		// Create client and go to the education management page
		$client = $this->client;
		$crawler = $client->request('GET', '/Admin/Education');
		$educationCount = $crawler->filter('table tbody tr')->count();
		$form = $crawler->selectButton('Go')->form();
		$form['educationTableView[education]['.($educationCount - 2).'][check]']->tick();
		$form['educationTableView[education]['.($educationCount - 1).'][check]']->tick();

		$crawler = $client->submit($form);

		$newEducationCount = $crawler->filter('table tbody tr')->count();

		$this->assertNotEquals($educationCount, $newEducationCount);
	}
}