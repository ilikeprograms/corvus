<?php

// src/Corvus/AdminBundle/Entity/EducationRepository.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\ORM\EntityManager,

    Corvus\CoreBundle\ORM\Repository\BaseEntityRepository;


class EducationRepository extends BaseEntityRepository
{
    public function __construct(EntityManager $em)
    {
        $this->originalEntityName = Education::getRepoName();
        parent::__construct($em);
    }
}