<?php

// src/Corvus/CoreBundle/Controller/AbstractTableViewController.php
namespace Corvus\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Request;

/**
 * @property-readonly  object  $entity             Entity object that the TableViewContoller manages
 * @property-readonly  object  $formType           The formType object that the TableViewController manages
 * @property-readonly  string  $tableViewDataName  The DataName of the entity, use when recieving the Entity data from a Request
 * @property-readonly  string  $tableViewTypeName  The TypeName of the xTableViewType, used when receiving the TableView data from a Request
 * 
 * @author Thomas Coleman <tom@ilikeprograms.com>
 */
abstract class AbstractTableViewController extends Controller
{
    /* Define Attributes that the grandchld of this class will need to instantiate
     * Allows the child class of this to use them in the methods this class defines 
     * ********** */
    
    
    /**
     * Entity object that the TableViewContoller manages.
     * 
     * @var object $oGntity
     */
    protected $ogEntity;
    
    /**
     * The formType object that the TableViewController manages.
     * 
     * @var object $formType
     */
    protected $formType;
    
    /**
     * The DataName of the entity, use when recieving the Entity data from a Request.
     * 
     * @var string $tableViewDataName
     */
    protected $tableViewDataName;
    
    /**
     * The TypeName of the xTableViewType, used when receiving the TableView data from Description.
     * 
     * @var string $_tableViewTypeName
     */
    protected $tableViewTypeName;


    /**
     * Abstract method signatures of common methods
     * which all TableViewController will inherit
     * ********** */
    

    /**
     * New action used to created a new Entity and persist it to the DB.
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request Symfony request object
     */
    abstract function newAction(Request $request);

    /**
     * Edit action used to edit an Entity matching $id.
     * 
     * @param int $id The id of the Entity that is to be edited
     * @param \Symfony\Component\HttpFoundation\Request $request Symfony request object
     */
    abstract function editAction($id, Request $request);

    /**
     * Order up action, used to move move the Entity which matches $id up one in the TableView.
     * 
     * @param int $id The id of the Entity to move up in the TableView
     */
    abstract function orderUpAction($id);

    /**
     * Order up action, used to move move the Entity which matches $id up one in the TableView.
     * 
     * @param int $id The id of the Entity to move up in the TableView
     */
    abstract function orderDownAction($id);

    /**
     * Delete action used to delete an Entity/multiple Entities from the TableView.
     * 
     * @param int $id The id of the Entity to delete
     * @param \Symfony\Component\HttpFoundation\Request $request Symfony request object
     */
    abstract function deleteAction($id, Request $request);
}