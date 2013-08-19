<?php

// src/Corvus/AdminBundle/Entity/ProjectHistory.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\ORM\EntityManager,

    Corvus\AdminBundle\ILP\ORM\Repository\BaseEntityRepository;


class ProjectHistoryRepository extends BaseEntityRepository
{
    public function __construct(EntityManager $em)
    {
        $this->_entityName = ProjectHistory::getRepoName();
        parent::__construct($em);
    }
}
