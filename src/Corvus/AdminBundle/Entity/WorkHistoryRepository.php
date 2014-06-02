<?php

// src/Corvus/AdminBundle/Entity/WorkHistory.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\ORM\EntityManager,

    Corvus\CoreBundle\ORM\Repository\BaseEntityRepository;


class WorkHistoryRepository extends BaseEntityRepository
{
    public function __construct(EntityManager $em)
    {
        $this->originalEntityName = WorkHistory::getRepoName();
        parent::__construct($em);
    }
}
