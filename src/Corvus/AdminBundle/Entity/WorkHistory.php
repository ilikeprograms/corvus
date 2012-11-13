<?php

namespace Corvus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Corvus\AdminBundle\Entity\WorkHistory
 */
class WorkHistory
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $employer_name
     */
    private $employer_name;

    /**
     * @var string $employer_address
     */
    private $employer_address;

    /**
     * @var date $start_date
     */
    private $start_date;

    /**
     * @var decimal $duration
     */
    private $duration;

    /**
     * @var string $role
     */
    private $role;

    /**
     * @var string $duties
     */
    private $duties;

    /**
     * @var string $feedback_received
     */
    private $feedback_received;

    /**
     * @var string $reflection
     */
    private $reflection;

    /**
     * @var string $employer_phone_number
     */
    private $employer_phone_number;

    /**
     * @var string $meta_title
     */
    private $meta_title;

    /**
     * @var string $meta_description
     */
    private $meta_description;

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
     * Set duration
     *
     * @param decimal $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * Get duration
     *
     * @return decimal 
     */
    public function getDuration()
    {
        return $this->duration;
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