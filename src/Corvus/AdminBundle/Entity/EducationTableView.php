<?php

// src/Corvus/AdminBundle/Entity/EducationTableView.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class EducationTableView
{
    protected $education;

    public function __construct()
    {
        $this->education = new ArrayCollection();
    }

    public function getEducation()
    {
        return $this->education;
    }
}