<?php

// src/Corvus/AdminBundle/Entity/Education.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM,

    Symfony\Component\Validator\Constraints as Assert,

    Corvus\CoreBundle\Entity\TableViewEntity;


/**
 * Corvus\AdminBundle\Entity\Education
 * 
 * @ORM\Entity(repositoryClass="Corvus\AdminBundle\Entity\EducationRepository")
 * @ORM\Table
 */
class Education extends TableViewEntity
{
    // Entity Name is needed to use Late static binding with TableViewEntity
    const ENTITY_NAME   = 'Education';
    const ROUTE_STEM    = 'education';

    
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
    private $education_institute;

    /**
     * @ORM\Column(type="string")
     * 
     * @Assert\Type(type="string")
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     */
    private $qualification;

    /**
     * @ORM\Column(type="date")
     * 
     * @Assert\NotBlank()
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
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $result;


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