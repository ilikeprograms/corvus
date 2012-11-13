<?php

namespace Corvus\AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
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

    public function testIndex()
    {
    	$client = $this->client;
        $crawler = $client->request('GET', '/Admin/');

        $this->assertEquals(1, $crawler->filter('h2:contains("Admin Dashboard")')->count());
    }

    // public function testGeneralSettings()
    // {

    // }

    public function testSiteDesign()
    {
    	$client = $this->client;
        $crawler = $client->request('GET', '/Admin/SiteDesign');

        $this->assertEquals(1, $crawler->filter('h2:contains("Site Design")')->count());
    }

    // public function testEducation()
    // {

    // }

    // public function testProjectHistory()
    // {

    // }

    // public function testWorkHistory()
    // {

    // }

    // public function testSkills()
    // {

    // }

    // public function testNavigation()
    // {

    // }

    // public function testDownloads()
    // {

    // }

    public function testAbout()
    {    
    	$client = $this->client;

    	$crawler = $client->request('GET', '/Admin/About');
    	$form = $crawler->selectButton('Submit')->form(array(
            'about[firstname]' => 'Mr Admin',
            'about[lastname]' => 'Pants',
            'about[age]' => '12',
            'about[bio]' => 'Mostly spend my time being a fantastic awesome admin!',
            'about[address]' => 'Moonbase',
            'about[location]' => 'The moon',
            'about[interests_hobbies]' => 'blah',
            'about[email_address]' => 'adminpants@adminpants.com',
            'about[twitter]' => 'MrAdminPants',
            'about[facebook]' => 'MrAdminPants',
        ));

        $errors = $client->submit($form);
        $this->assertLessThan(1, $errors->filter('html:contains("error")')->count());

        $client->restart();
        $crawler = $client->request('GET', '/Admin/About');

        // Set non nullable form fields to null
        $form2 = $crawler->selectButton('Submit')->form(array(
            'about[firstname]' => null,
            'about[lastname]' => null,
            'about[age]' => null,
            'about[bio]' => null,
            'about[address]' => null,
            'about[location]' => null,
            'about[email_address]' => null,
        ));

        $errors2 = $client->submit($form2);
        // Make sure errors are produced correctly
        $this->assertGreaterThan(0, $errors2->filter('html:contains("error")')->count());
    }
}
