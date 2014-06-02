<?php

// src/Corvus/AdminBundle/Entity/ProjectHistory.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\ORM\EntityManager,

    Corvus\CoreBundle\ORM\Repository\BaseEntityRepository;


class ProjectHistoryRepository extends BaseEntityRepository
{
    public function __construct(EntityManager $em)
    {
        $this->originalEntityName = ProjectHistory::getRepoName();
        parent::__construct($em);
    }
}
