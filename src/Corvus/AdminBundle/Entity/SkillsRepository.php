<?php

// src/Corvus/AdminBundle/Entity/SkillsTableView.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\ORM\EntityManager,

    Corvus\AdminBundle\ILP\ORM\Repository\BaseEntityRepository;


class SkillsRepository extends BaseEntityRepository
{
    public function __construct(EntityManager $em)
    {
        $this->originalEntityName = Skills::getRepoName();
        parent::__construct($em);
    }
}
