<?php

namespace Corvus\AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NavigationControllerTest extends WebTestCase
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
//	public function testNewNavigation()
//	{
//		// Create client and go to the New Navigation page
//		$client = $this->client;
//		$crawler = $client->request('GET', '/Admin/Navigation/New');
//
//		$form = $crawler->selectButton('Submit')->form(array(
//			'navigation[navigation_order]' => '-3',
//			'navigation[href]' => '/MinusThree',
//			'navigation[title]' => 'Minus Three',
//			'navigation[alt]' => 'Minus Three Link',
//		));
//
//		$errors = $client->submit($form);
//		$this->assertLessThan(1, $errors->filter('html:contains("error")')->count());
//
//		$client->restart();
//		$crawler = $client->request('GET', '/Admin/Navigation/New');
//
//		$form = $crawler->selectButton('Submit')->form(array(
//			'navigation[navigation_order]' => '-2',
//			'navigation[href]' => '/MinusTwo',
//			'navigation[title]' => 'Minus Two',
//			'navigation[alt]' => 'Minus Two Link',
//		));
//
//		$client->submit($form);
//
//		$client->restart();
//		$crawler = $client->request('GET', '/Admin/Navigation/New');
//
//		$form = $crawler->selectButton('Submit')->form(array(
//			'navigation[navigation_order]' => '-1',
//			'navigation[href]' => '/Minus One',
//			'navigation[title]' => 'Minus One',
//			'navigation[alt]' => 'Minus One Link',
//		));
//
//		$client->submit($form);
//	}
//
//	public function testEditNavigation()
//	{
//		// Create client and go to the navigation management page
//		$client = $this->client;
//		$crawler = $client->request('GET', '/Admin/Navigation');
//		$navigationTitle = $crawler->filter('table tbody tr')->first()->filter('td')->eq(3)->text();
//
//		$link = $crawler->selectLink("Edit")->first()->link();
//		$crawler = $client->click($link);
//
//		// Check if the editing page can be reached from the edit button
//		$this->assertEquals(1, $crawler->filter('h2:contains("Editing")')->count());
//
//		$form = $crawler->selectButton('Submit')->form();
//		$form['navigation[title]'] = 'Minus One Edited';
//		$errors = $client->submit($form);
//		// Check if the edit form has any errors
//		$this->assertLessThan(1, $errors->filter('html:contains("error")')->count());
//
//		$editedNavigationTitle = $errors->filter('table tbody tr')->first()->filter('td')->eq(3)->text();
//
//		$this->assertNotEquals($navigationTitle, $editedNavigationTitle);
//	}
//
//	public function testOrderDown()
//	{
//		// Create client and go to the navigation management page
//		$client = $this->client;
//		$crawler = $client->request('GET', '/Admin/Navigation');
//
//		$firstTitle = $crawler->filter('table tbody tr')->eq(0)->filter('td')->eq(3)->text();
//		$secondTitle = $crawler->filter('table tbody tr')->eq(1)->filter('td')->eq(3)->text();
//
//		$downOrderLink = $crawler->selectLink('DownArrow')->first()->link();
//		$crawler = $client->click($downOrderLink);
//
//		$newFirstTitle = $crawler->filter('table tbody tr')->eq(0)->filter('td')->eq(3)->text();
//		$newSecondTitle = $crawler->filter('table tbody tr')->eq(1)->filter('td')->eq(3)->text();
//
//		$this->assertEquals($firstTitle, $newSecondTitle);
//		$this->assertEquals($secondTitle, $newFirstTitle);
//	}
//
//	public function testOrderUp()
//	{
//		// Create client and go to the navigation management page
//		$client = $this->client;
//		$crawler = $client->request('GET', '/Admin/Navigation');
//
//		$firstTitle = $crawler->filter('table tbody tr')->eq(0)->filter('td')->eq(3)->text();
//		$secondTitle = $crawler->filter('table tbody tr')->eq(1)->filter('td')->eq(3)->text();
//
//		$upOrderLink = $crawler->selectLink('UpArrow')->first()->link();
//		$crawler = $client->click($upOrderLink);
//
//		$newFirstTitle = $crawler->filter('table tbody tr')->eq(0)->filter('td')->eq(3)->text();
//		$newSecondTitle = $crawler->filter('table tbody tr')->eq(1)->filter('td')->eq(3)->text();
//
//		$this->assertEquals($firstTitle, $newSecondTitle);
//		$this->assertEquals($secondTitle, $newFirstTitle);
//	}
//
//	public function testDeleteSingleNavigation()
//	{
//		// Create client and go to the navigation management page
//		$client = $this->client;
//		$crawler = $client->request('GET', '/Admin/Navigation');
//
//		$navigationCount = $crawler->filter('table tbody tr')->count();
//
//		$deleteLink = $crawler->selectLink("Delete")->first()->link();
//		$crawler = $client->click($deleteLink);
//
//		$newNavigationCount = $crawler->filter('table tbody tr')->count();
//
//		$this->assertNotEquals($navigationCount, $newNavigationCount);
//	}
//
//	public function testDeleteMultipleNavigation()
//	{
//		// Create client and go to the navigation management page
//		$client = $this->client;
//		$crawler = $client->request('GET', '/Admin/Navigation');
//		$navigationCount = $crawler->filter('table tbody tr')->count();
//		$form = $crawler->selectButton('Go')->form();
//		$form['navigationTableView[navItems][0][check]']->tick();
//		$form['navigationTableView[navItems][1][check]']->tick();
//
//		$crawler = $client->submit($form);
//
//		$newNavigationCount = $crawler->filter('table tbody tr')->count();
//
//		$this->assertNotEquals($navigationCount, $newNavigationCount);
//	}
}