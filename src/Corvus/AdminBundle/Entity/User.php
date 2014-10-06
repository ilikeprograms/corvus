<?php

// src/Corvus/AdminBundle/Entity/User.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM,

    Symfony\Component\Validator\Constraints as Assert,

    Symfony\Component\Security\Core\User\UserInterface;


/**
 * Corvus\AdminBundle\Entity\User
 * 
 * @ORM\Entity
 * @ORM\Table
 */
class User implements UserInterface
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
     * @Assert\NotNull()
     */
    private $username;

    /**
     * @ORM\Column(type="string")
     * 
     * @Assert\NotNull()
     */
    private $password;
    
    /**
     * @var string $plainPassword
     */
    private $plainPassword;

    /**
     * @var string $salt
     */
    private $salt;

    /**
     * @var boolean $isActive
     */
    private $isActive;

    public function __construct()
    {
        $this->isActive = true;
        $this->salt = md5(uniqid(null, true));
    }

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
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }
    
    /**
     * Set password
     *
     * @param string $password
     */
    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function getRoles()
    {
        return array('ROLE_ADMIN');
    }

    public function eraseCredentials()
    {
    }

    public function equals(UserInterface $user)
    {

    }
}