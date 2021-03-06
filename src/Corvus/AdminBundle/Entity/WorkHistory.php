<?php

// src/Corvus/AdminBundle/Entity/WorkHistory.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM,

    Symfony\Component\Validator\Constraints as Assert,

    Corvus\CoreBundle\Entity\TableViewEntity;

/**
 * Corvus\AdminBundle\Entity\WorkHistory
 * 
 * @ORM\Entity(repositoryClass="Corvus\AdminBundle\Entity\WorkHistoryRepository")
 * @ORM\Table
 */
class WorkHistory extends TableViewEntity
{
    // Entity Name is needed to use Late static binding with TableViewEntity
    const ENTITY_NAME   = 'Work History';
    const ROUTE_STEM    = 'work_history';

    
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="string")
     * 
     * @Assert\NotNull()
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $employer_name;

    /**
     * @ORM\Column(type="string", nullable=true)
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $employer_address;

    /**
     * @ORM\Column(type="date")
     * 
     * @Assert\NotNull()
     * @Assert\Date()
     */
    private $start_date;

    /**
     * @ORM\Column(type="date", nullable=true)
     * 
     * @Assert\Date()
     */
    private $end_date;
    
    /**
     * @ORM\Column(type="boolean")
     * 
     * @Assert\Type(type="bool")
     */
    private $is_current_position;

    /**
     * @ORM\Column(type="string")
     * 
     * @Assert\NotNull()
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $role;

    /**
     * @ORM\Column(type="string", length=2500, nullable=true)
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=2500)
     */
    private $duties;

    /**
     * @ORM\Column(type="string", length=2000, nullable=true)
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=2000)
     */
    private $feedback_received;

    /**
     * @ORM\Column(type="string", length=2000, nullable=true)
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=2000)
     */
    private $reflection;

    /**
     * @ORM\Column(type="string", nullable=true)
     * 
     * @Assert\Length(max=255)
     */
    private $employer_phone_number;

    /**
     * @ORM\Column(type="boolean")
     * 
     * @Assert\Type(type="bool")
     */
    private $isPublished;

    /**
     * @ORM\Column(type="string")
     * 
     * @Assert\NotNull()
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $meta_title;

    /**
     * @ORM\Column(type="string", nullable=true)
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $meta_description;


    public function __construct()
    {
        parent::__construct();
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
     * Set slug.
     * 
     * @param string $slug
     * 
     * @return \Corvus\AdminBundle\Entity\WorkHistory
     */
    public function setSlug($slug)
    {
        if ($slug !== NULL) {
            $this->slug = $slug;
        }
        
        return $this;
    }

    /**
     * Get slug.
     * 
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set employer_name
     *
     * @param string $employerName
     */
    public function setEmployerName($employerName)
    {
        $this->employer_name = $employerName;
    }

    /**
     * Get employer_name
     *
     * @return string 
     */
    public function getEmployerName()
    {
        return $this->employer_name;
    }

    /**
     * Set employer_address
     *
     * @param string $employerAddress
     */
    public function setEmployerAddress($employerAddress)
    {
        $this->employer_address = $employerAddress;
    }

    /**
     * Get employer_address
     *
     * @return string 
     */
    public function getEmployerAddress()
    {
        return $this->employer_address;
    }

    /**
     * Set start_date
     *
     * @param date $startDate
     */
    public function setStartDate($startDate)
    {
        $this->start_date = $startDate;
    }

    /**
     * Get start_date
     *
     * @return date 
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Set end_date
     *
     * @param date $endDate
     */
    public function setEndDate($endDate)
    {
        $this->end_date = $endDate;
    }

    /**
     * Get end_date
     *
     * @return date
     */
    public function getEndDate()
    {
        return $this->end_date;
    }
    
    /**
     * Get is_current_position
     *
     * @return boolean 
     */
    public function getIsCurrentPosition()
    {
        return $this->is_current_position;
    }

    /**
     * Set is_current_position
     *
     * @param boolean $isCurrentPosition
     */
    public function setIsCurrentPosition($isCurrentPosition)
    {
        $this->is_current_position = $isCurrentPosition;
    }

    /**
     * Set role
     *
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set duties
     *
     * @param string $duties
     */
    public function setDuties($duties)
    {
        $this->duties = $duties;
    }

    /**
     * Get duties
     *
     * @return string 
     */
    public function getDuties()
    {
        return $this->duties;
    }

    /**
     * Set feedback_received
     *
     * @param string $feedbackReceived
     */
    public function setFeedbackReceived($feedbackReceived)
    {
        $this->feedback_received = $feedbackReceived;
    }

    /**
     * Get feedback_received
     *
     * @return string 
     */
    public function getFeedbackReceived()
    {
        return $this->feedback_received;
    }

    /**
     * Set reflection
     *
     * @param string $reflection
     */
    public function setReflection($reflection)
    {
        $this->reflection = $reflection;
    }

    /**
     * Get reflection
     *
     * @return string 
     */
    public function getReflection()
    {
        return $this->reflection;
    }

    /**
     * Set employer_phone_number
     *
     * @param string $employerPhoneNumber
     */
    public function setEmployerPhoneNumber($employerPhoneNumber)
    {
        $this->employer_phone_number = $employerPhoneNumber;
    }

    /**
     * Get employer_phone_number
     *
     * @return string 
     */
    public function getEmployerPhoneNumber()
    {
        return $this->employer_phone_number;
    }

    /**
     * Set isPublished.
     * 
     * @param string $isPublished If this entity should be published or not.
     * 
     * @return \Corvus\AdminBundle\Entity\ProjectHistory
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;

        return $this;
    }
    
    /**
     * Get isPublished.
     * 
     * @return string
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }

    /**
     * Set meta_title
     *
     * @param string $meta_title
     */
    public function setMetaTitle($metaTitle)
    {
        $this->meta_title = $metaTitle;
    }

    /**
     * Get meta_title
     *
     * @return string
     */
    public function getMetaTitle()
    {
        return $this->meta_title;
    }

    /**
     * Set meta_description
     *
     * @param string $meta_description
     */
    public function setMetaDescription($metaDescription)
    {
        $this->meta_description = $metaDescription;
    }

    /**
     * Get meta_description
     *
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->meta_description;
    }
}