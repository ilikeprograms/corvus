<?php

namespace Corvus\AdminBundle\Tests\Entity;

use Corvus\AdminBundle\Entity\About;

class AboutTest extends \PHPUnit_Framework_TestCase
{
	protected $about;

	public function setUp()
	{
		parent::setUp();

		$this->about = new About();
	}

	public function testGetFirstname()
	{
		$firstname = 'Mr Admin';
		$this->about->setFirstname($firstname);
		$this->assertEquals($firstname, $this->about->getFirstname());
	}

	public function testGetLastname()
	{
		$lastname = 'Pants';
		$this->about->setLastname($lastname);
		$this->assertEquals($lastname, $this->about->getLastname());
	}

	public function testGetAge()
	{
		$age = 21;
		$this->about->setAge($age);
		$this->assertEquals($age, $this->about->getAge());
	}

	public function testGetBio()
	{
		$bio = 'Mostly spend my time being a fantastic awesome admin!';
		$this->about->setBio($bio);
		$this->assertEquals($bio, $this->about->getBio());
	}

	public function testGetAddress()
	{
		$address = 'Moonbase';
		$this->about->setAddress($address);
		$this->assertEquals($address, $this->about->getAddress());
	}

	public function testLocation()
	{
		$location = 'The moon';
		$this->about->setLocation($location);
		$this->assertEquals($location, $this->about->getLocation());
	}

	public function testInterestsHobbies()
	{
		$interestsHobbies = 'blah';
		$this->about->setInterestsHobbies($interestsHobbies);
		$this->assertEquals($interestsHobbies, $this->about->getInterestsHobbies());
	}

	public function testEmailAddress()
	{
		$emailAddress = 'adminpants@adminpants.com';
		$this->about->setEmailAddress($emailAddress);
		$this->assertEquals($emailAddress, $this->about->getEmailAddress());
	}

	public function testTwitter()
	{
		$twitter = 'MrAdminPants';
		$this->about->setTwitter($twitter);
		$this->assertEquals($twitter, $this->about->getTwitter());
	}

	public function testFacebook()
	{
		$facebook = 'MrAdminPants';
		$this->about->setFacebook($facebook);
		$this->assertEquals($facebook, $this->about->getFacebook());
	}
}