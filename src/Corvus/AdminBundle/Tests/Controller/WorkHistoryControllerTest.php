<?php

namespace Corvus\AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class WorkHistoryControllerTest extends WebTestCase
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
//	public function testNewWorkHistory()
//	{
//		$errors = $this->ignoreAddWorkHistory();
//		$this->assertLessThan(1, $errors->filter('html:contains("error")')->count());
//
//		// Add two more work history to test the batch delete
//		$this->ignoreAddWorkHistory();
//		$this->ignoreAddWorkHistory();
//	}
//
//	private function ignoreAddWorkHistory()
//	{
//		// Create client and go to the New Work History page
//		$client = $this->client;
//		$crawler = $client->request('GET', '/Admin/WorkHistory/New');
//
//		$form = $crawler->selectButton('Submit')->form(array(
//			'workHistory[employer_name]' => 'Test Work History',
//			'workHistory[employer_address]' => 'This is a test work history.',
//			'workHistory[start_date]' => array(
//				'year' => 2007,
//				'month' => 1,
//				'day' => 1,
//			),
//			'workHistory[duration]' => 1,
//			'workHistory[role]' => 'Tester',
//			'workHistory[duties]' => 'Testing',
//			'workHistory[feedback_received]' => 'Excellent Tester',
//			'workHistory[reflection]' => 'I love testing',
//			'workHistory[employer_phone_number]' => 1234,
//			'workHistory[meta_title]' => 'Meta Title',
//			'workHistory[meta_description]' => 'Meta Description',
//		));
//
//		return $client->submit($form);
//	}
//
//	public function testEditWorkHistory()
//	{
//		// Create client and go to the work history management page
//		$client = $this->client;
//		$crawler = $client->request('GET', '/Admin/WorkHistory');
//		$employerName = $crawler->filter('table tr')->last()->filter('td')->eq(1)->text();
//
//		$link = $crawler->selectLink("Edit")->last()->link();
//		$crawler = $client->click($link);
//
//		// Check if the editing page can be reached from the edit button
//		$this->assertEquals(1, $crawler->filter('h2:contains("Edit")')->count());
//
//		$form = $crawler->selectButton('Submit')->form();
//		$form['workHistory[employer_name]'] = 'Test Work History 2';
//		$errors = $client->submit($form);
//		// Check if the edit form has any errors
//		$this->assertLessThan(1, $errors->filter('html:contains("error")')->count());
//
//		$editedEmployerName = $errors->filter('table tr')->last()->filter('td')->eq(1)->text();
//
//		$this->assertNotEquals($employerName, $editedEmployerName);
//	}
//
//	public function testDeleteSingleWorkHistory()
//	{
//		// Create client and go to the work history management page
//		$client = $this->client;
//		$crawler = $client->request('GET', '/Admin/WorkHistory');
//		$workHistoryCount = $crawler->filter('table tbody tr')->count();
//
//		$deleteLink = $crawler->selectLink("Delete")->last()->link();
//
//		$crawler = $client->click($deleteLink);
//
//		$newWorkHistoryCount = $crawler->filter('table tbody tr')->count();
//
//		$this->assertNotEquals($workHistoryCount, $newWorkHistoryCount);
//	}
//
//	public function testDeleteMultipleWorkHistory()
//	{
//		// Create client and go to the work history management page
//		$client = $this->client;
//		$crawler = $client->request('GET', '/Admin/WorkHistory');
//		$workHistoryCount = $crawler->filter('table tbody tr')->count();
//		$form = $crawler->selectButton('Go')->form();
//		$form['workHistoryTableView[workHistory]['.($workHistoryCount - 2).'][check]']->tick();
//		$form['workHistoryTableView[workHistory]['.($workHistoryCount - 1).'][check]']->tick();
//		$crawler = $client->submit($form);
//
//		$newWorkHistoryCount = $crawler->filter('table tbody tr')->count();
//
//		$this->assertNotEquals($workHistoryCount, $newWorkHistoryCount);
//	}
}