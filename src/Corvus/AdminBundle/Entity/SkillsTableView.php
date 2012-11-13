<?php

// src/Corvus/AdminBundle/Entity/SkillTableView.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class SkillsTableView
{
    protected $skills;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
    }

    public function getSkills()
    {
        return $this->skills;
    }
}