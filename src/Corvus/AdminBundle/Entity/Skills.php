<?php

namespace Corvus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Corvus\AdminBundle\Entity\Skills
 */
class Skills
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $skill_name
     */
    private $skill_name;

    /**
     * @var string $competency
     */
    private $competency;

    /**
     * @var decimal $years_experience
     */
    private $years_experience;

    /**
     * @var string $description
     */
    private $description;


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
}