<?php

// src/Corvus/AdminBundle/Entity/Education.php
namespace Corvus\AdminBundle\Entity;

use Corvus\AdminBundle\ILP\Entity\TableViewEntity;


/**
 * Corvus\AdminBundle\Entity\Education
 */
class Education extends TableViewEntity
{
    // Entity Name is needed to use Late static binding with TableViewEntity
    const ENTITY_NAME = 'education';

    
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $education_institute
     */
    private $education_institute;

    /**
     * @var string $qualification
     */
    private $qualification;

    /**
     * @var date $start_date
     */
    private $start_date;

    /**
     * @var decimal $duration
     */
    private $duration;

    /**
     * @var string $result
     */
    private $result;

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
     * Set education_institute
     *
     * @param string $educationInstitute
     */
    public function setEducationInstitute($educationInstitute)
    {
        $this->education_institute = $educationInstitute;
    }

    /**
     * Get education_institute
     *
     * @return string 
     */
    public function getEducationInstitute()
    {
        return $this->education_institute;
    }

    /**
     * Set qualification
     *
     * @param string $qualification
     */
    public function setQualification($qualification)
    {
        $this->qualification = $qualification;
    }

    /**
     * Get qualification
     *
     * @return string 
     */
    public function getQualification()
    {
        return $this->qualification;
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
     * Set result
     *
     * @param string $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * Get result
     *
     * @return string 
     */
    public function getResult()
    {
        return $this->result;
    }
}