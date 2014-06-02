<?php

// src/Corvus/AdminBundle/Entity/NavigationRepository.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\ORM\EntityManager,

    Corvus\CoreBundle\ORM\Repository\BaseEntityRepository;


class NavigationRepository extends BaseEntityRepository
{
    public function __construct(EntityManager $em)
    {
        $this->originalEntityName = Navigation::getRepoName();
        parent::__construct($em);
    }
}