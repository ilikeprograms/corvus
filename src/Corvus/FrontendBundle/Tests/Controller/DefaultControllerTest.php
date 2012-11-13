<?php

namespace Corvus\FrontendBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
    	$client = static::createClient();

        $crawler = $client->request('GET', '/');
        $response = $client->getResponse()->getContent();

        $this->assertNotNull($response);
    }
}
