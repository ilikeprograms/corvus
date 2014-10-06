<?php

// src/Corvus/AdminBundle/Entity/About.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM,
    
    Symfony\Component\Validator\Constraints as Assert;

/**
 * Corvus\AdminBundle\Entity\About
 * 
 * @ORM\Entity
 * @ORM\Table
 */
class About
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * 
     * @Assert\Type(type="string")
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string")
     * 
     * @Assert\Type(type="string")
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="integer")
     * 
     * @Assert\NotBlank()
     * @Assert\Range(
     *  min=0,
     *  max=130
     * )
     */
    private $age;

    /**
     * @ORM\Column(type="text")
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=15000)
     * @Assert\NotBlank()
     */
    private $bio;

    /**
     * @ORM\Column(type="string", nullable=true)
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", nullable=true)
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $location;

    /**
     * @ORM\Column(type="text", nullable=true)
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=10000)
     */
    private $interests_hobbies;

    /**
     * @ORM\Column(type="string")
     * 
     * @Assert\Type(type="string")
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email_address;

    /**
     * @ORM\Column(type="string", nullable=true)
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $twitter;

    /**
     * @ORM\Column(type="string", nullable=true)
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $facebook;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set age
     *
     * @param integer $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set bio
     *
     * @param string $bio
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    /**
     * Get bio
     *
     * @return string 
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * Set address
     *
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set location
     *
     * @param string $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set interests_hobbies
     *
     * @param string $interestsHobbies
     */
    public function setInterestsHobbies($interestsHobbies)
    {
        $this->interests_hobbies = $interestsHobbies;
    }

    /**
     * Get interests_hobbies
     *
     * @return string 
     */
    public function getInterestsHobbies()
    {
        return $this->interests_hobbies;
    }

    /**
     * Set email_address
     *
     * @param string $emailAddress
     */
    public function setEmailAddress($emailAddress)
    {
        $this->email_address = $emailAddress;
    }

    /**
     * Get email_address
     *
     * @return string 
     */
    public function getEmailAddress()
    {
        return $this->email_address;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    }

    /**
     * Get twitter
     *
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * Get facebook
     *
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }
}