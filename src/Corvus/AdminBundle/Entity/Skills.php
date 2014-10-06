<?php

// src/Corvus/AdminBundle/Entity/Skills.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM,

    Symfony\Component\Validator\Constraints as Assert,

    Corvus\CoreBundle\Entity\TableViewEntity;


/**
 * Corvus\AdminBundle\Entity\Skills
 * 
 * @ORM\Entity(repositoryClass="Corvus\AdminBundle\Entity\SkillsRepository")
 * @ORM\Table
 */
class Skills extends TableViewEntity
{
    // Entity Name is needed to use Late static binding with TableViewEntity
    const ENTITY_NAME   = 'Skills';
    const ROUTE_STEM    = 'skills';


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
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $skill_name;

    /**
     * @ORM\Column(type="string", nullable=true)
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $competency;

    /**
     * @ORM\Column(type="decimal", nullable=true)
     */
    private $years_experience;

    /**
     * @ORM\Column(type="text", nullable=true)
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=2500)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     * 
     * @Assert\Type(type="bool")
     */
    private $can_display_skill;

    /**
     * @ORM\Column(type="boolean")
     * 
     * @Assert\Type(type="bool")
     */
    private $is_quick_skill;


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
     * Set skill_name
     *
     * @param string $skill_name
     */
    public function setSkillName($skill_name)
    {
        $this->skill_name = $skill_name;
    }

    /**
     * Get skill_name
     *
     * @return string 
     */
    public function getSkillName()
    {
        return $this->skill_name;
    }

    /**
     * Set competency
     *
     * @param string $competency
     */
    public function setCompetency($competency)
    {
        $this->competency = $competency;
    }

    /**
     * Get competency
     *
     * @return string 
     */
    public function getCompetency()
    {
        return $this->competency;
    }

    /**
     * Set years_experience
     *
     * @param decimal $years_experience
     */
    public function setYearsExperience($years_experience)
    {
        $this->years_experience = $years_experience;
    }

    /**
     * Get years_experience
     *
     * @return decimal 
     */
    public function getYearsExperience()
    {
        return $this->years_experience;
    }

    /**
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set can_display_skill
     *
     * @param boolean $canDisplaySkill
     */
    public function setCanDisplaySkill($canDisplaySkill)
    {
        $this->can_display_skill = $canDisplaySkill;
    }

    /**
     * Get can_display_skill
     *
     * @return boolean 
     */
    public function getCanDisplaySkill()
    {
        return $this->can_display_skill;
    }
    
    /**
     * Set is_quick_skill
     *
     * @param boolean $isQuickSkill
     */
    public function setIsQuickSkill($isQuickSkill)
    {
        $this->is_quick_skill = $isQuickSkill;
    }

    /**
     * Get is_quick_skill
     *
     * @return boolean 
     */
    public function getIsQuickSkill()
    {
        return $this->is_quick_skill;
    }
}