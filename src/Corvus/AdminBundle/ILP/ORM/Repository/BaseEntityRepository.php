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
     * The original name of the Entity, e.g ProjectHistory.
     * 
     * @var string $_originalEntityName
     */
    protected $_originalEntityName;

    
    /**
     * Sets up an EntityRepository for xEntity, which has custom functionality for TableViews.
     * 
     * Dont forget to provide a value for $_entityName before calling parent::__construct().
     * 
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        /* Store the OriginalEntityName before it gets transformed by the parent constructor
         * Turns from ProjectHistory to Corvus\AdminBundle\Entity\ProjectHistory etc
         * when the parent is constructed.
         */
        $this->_originalEntityName = $this->_entityName;
        
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
     * It does this by swapping the row_order of the next Entity which is found
     * in the direction the row_order will be swapped. So if two Entities have
     * row_order 1 and row_order 2, the Entities will swap row_order's, making
     * them appear before/after each other when the Entities are queried.
	 * 
	 * Alternatively, if there is a row_order gap of 2 or more, the Entity which we
	 * are trying to change will remain the same, but the closest Entity in the
	 * specified direction will be fixed so its row_order is either +1 or -1 from
	 * the row_order of the Entity we are trying to change.
	 * So if Entity a.row_order = 1 AND Entity b.row_order = 4, Entity a would
	 * then be a.row_order = 1 AND Entity b.row_order = 2.
     * 
     * This methods checks to see if all the row_orders are 0, if so it will
     * automaticaly increment all the row_orders starting at 1. Fixes a problem
     * when the row_order field is created with a migrations row_order's become
     * 0 by default.
     *  
     * @param int    $rowOrderId  The id of the Entity to change the row_order.
     * @param string $direction   Direction to move the entity in the TableView (Up/down)
     * 
     * @return void
     */
    public function changeRowOrder($rowOrderId, $direction)
    {
        // -1 for UP and 1 for Down. Add/removes 1 from row_order to find the other entity
    	$rowOrderDir = $direction == 'Up' ? -1 : 1;

        // Get both entities and store their row orders
    	$entity = $this->findOneBy(array('id' => $rowOrderId));
        if ($entity == null) {
            return;
        }
        
        // Find the Max row_order
        $maxRowOrder = $this->findMaxRowOrder();
        
        // If MAX(row_order) === 0, we need to fix the row_orders
        if ($maxRowOrder === 0) {
            // Get all the Entities in this repository
            $entities = $this->findAll();
            
            // Starting at 1
            $i = 1;
            foreach ($entities as $entity) {
                // Start increasing the row_orders, by 1
                $entity->setRowOrder($i);
                $this->_em->persist($entity);
                $i++;
            }
            
            // Save the now fixed row_orders and return
            $this->_em->flush();
            return;
        }
        
		// Row order[0] = row_order of the Entity to reorder
    	$rowOrders[] = $entity->getRowOrder();
        
		// Find the closest Entity in terms of row_order to the above Entity, either Up or Down
		$otherEntity = $this->findClosestEntityInDirection($rowOrders[0], $rowOrderDir);

		if ($otherEntity) {
			$rowOrders[] = $otherEntity->getRowOrder();
			
			// Increase/Decrement the row_order, this row_order should be next
			$nextOrder = $rowOrders[0] + $rowOrderDir;
			
			/* If the $otherEntity row_order does not match, we know there must be atleast
			 * 2 difference between the row_orders, so we can fix this
			 */
			if ($nextOrder !== $rowOrders[1]) {
				// Set the row_order to be -1/+1 of the row_order of the Entity we are trying to reorder
				$otherEntity->setRowOrder($nextOrder);
			} else {
				// Otherwise they are next to each other, so swap the row_orders
				$otherEntity->setRowOrder($rowOrders[0]);
				$entity->setRowOrder($rowOrders[1]);
			}

			// Persist and flush the entities with the now swapped row orders
			$this->_em->persist($entity);
			$this->_em->persist($otherEntity);
			$this->_em->flush();
		}
    }
	
	/**
	 * Finds the Closest Entity to the Entity with $rowOrder, in the direction given,
	 * where direction is either -1 or 1.
	 * 
	 * @param int $rowOrder The row order to start finding an Entity with the closest row_order
	 * @param int $direction The direction to find the Entity, -1 for DESC, 1 for ASC
	 * 
	 * @return Object
	 */
	private function findClosestEntityInDirection($rowOrder, $direction)
	{		
		// Set the operator to Less than or Greater than based on Direction
		$operator = $direction === -1 ? '<' : '>';
		// Set the Sort direction, makes sure we are finding the closest result in the right direction
		$sortDir = $direction === -1 ? 'DESC' : 'ASC';

		$qb = $this->_em->createQueryBuilder('p')
            ->select('p')
			->setMaxResults('1') // Find 1st closest Entity
			->where('p.row_order ' . $operator . ' :order') // Use < || > depending on $direction
			->setParameter('order', $rowOrder)
			->orderBy('p.row_order',  $sortDir) // Set the ORDER BY, find rows in right direction
			->from('CorvusAdminBundle:' . $this->_originalEntityName . ' p');

		return $qb->getQuery()->getResult()[0];
	}
    
    /**
     * Find the Max row_order for all Entities managed by this repository.
     * 
     * @return int $result['max'] The maximum value of the row_order column
     */
    public function findMaxRowOrder()
    {
        /* Query written like this allows the attribute to be added
         * using $stmt->bindValue/bindParamater wouldnt work.
         */
        $sql = 'SELECT MAX(row_order) as max FROM ' . $this->_originalEntityName;
        // Get the Entity manager DB con and prepare the RAW SQL and execute
        $stmt = $this->getEntityManager()
            ->getConnection()
            ->prepare($sql);
        $stmt->execute();
        // Fetch the single result
        $result = $stmt->fetch();
        
        // Return the Max row_order
        return (int)$result['max'];
    }
    
    /**
     * Find all Files which are linked to the Entity matching $entity_id
     * Where the file_type is 'images' (Finds all images).
     * 
     * @param int $entity_id The id of the Entity to find the 'image' File(s)
     * 
     * @return array All of the Files of file_type image linked to the Entity
     */
    public function findEntityImages($entity_id)
    {
        $images = $this->getEntityManager()->getRepository('CorvusAdminBundle:File')
            ->findBy(array(
                'file_type'   => 'image',
                'entity_name' => $this->_originalEntityName,
                'entity_id'   => $entity_id)
            );

        return $images;
    }
    
    /**
     * Find all Files which are linked to the Entity matching $entity_id.
     * 
     * @param int $entity_id The id of the Entity to find the File(s)
     * 
     * @return array All of the Files linked to the Entity
     */
    public function findEntityFiles($entity_id) {
        $files = $this->getEntityManager()->getRepository('CorvusAdminBundle:File')
            ->findBy(array(
                'entity_name' => $this->_originalEntityName,
                'entity_id'   => $entity_id)
            );
        
        return $files;
    }
}
