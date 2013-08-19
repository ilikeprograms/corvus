<?php

// src/Corvus/AdminBundle/ILP/ORM/Repository/BaseEntityRepository.php
namespace Corvus\AdminBundle\ILP\ORM\Repository;

use Doctrine\ORM\EntityRepository,
    Doctrine\ORM\EntityManager;


class BaseEntityRepository extends EntityRepository
{
    /**
     * The name of the Entity that the EntityRepository provides Data Access for.
     * 
     * @var string $_entityName 
     */
    protected $_entityName;

    
    /**
     * Sets up an EntityRepository for xEntity, which has custom functionality for TableViews.
     * 
     * Dont forget to provide a value for $_entityName before calling parent::__construct().
     * 
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        /* Get the Class metadata for the Entity Repository that is inheriting from this class
         * _entityName should be setup in the constructor of the child class
         * 
         * Like:
         * 
         * public function __construct(EntityManager $em)
         * {
         *      $this->_entityName = Education::getRepoName();
         *      parent::__construct($em);
         * }
         */
        $entityClassMetaData = $em->getClassMetadata('Corvus\AdminBundle\Entity\\' . $this->_entityName);

        // Construct the parent, fixes the problem with a child class inheriting from this class.
        parent::__construct($em, $entityClassMetaData);
    }

    /**
     * Find all of the Entities that this EntityRepository manages, e.g. All Education records.
     * 
     * @return array All the Entities found for this EntityRepository
     */
    public function findAll()
    {
        return $this->findBy(array(), array('row_order' => 'ASC'));
    }

    /**
     * Changes the row_order of an Entity which is found by $rowOrderId
     * In the TableView the Entity would appear to move up/down based on $direction
     * E.g. 'Up' would make an Entity move up in the TableView, but -1 in row_order.
     *  
     * @param int    $rowOrderId  The id of the Entity to change the row_order.
     * @param string $direction   Direction to move the entity in the TableView (Up/down)
     */
    public function changeRowOrder($rowOrderId, $direction)
    {
        // -1 for UP and 1 for Down. Add/removes 1 from row_order to find the other entity
    	$rowOrderDir = $direction == 'Up' ? -1 : 1;

        // Get both entities and store their row orders
    	$entity = $this->findOneBy(array('row_order' => $rowOrderId));
    	$rowOrders[] = $entity->getRowOrder();               // Add/remove 1 from row_order here
    	$otherEntity = $this->findOneBy(array('row_order' => $rowOrders[0] + $rowOrderDir));
    	$rowOrders[] = $otherEntity->getRowOrder();

        // Swap the row orders with each other
    	$entity->setRowOrder($rowOrders[1]);
    	$otherEntity->setRowOrder($rowOrders[0]);

        // Persist and flush the entities with the now swapped row orders
    	$this->_em->persist($entity);
    	$this->_em->persist($otherEntity);
    	$this->_em->flush();
    }
}
