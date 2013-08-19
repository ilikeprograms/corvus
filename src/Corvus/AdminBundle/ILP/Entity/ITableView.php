<?php

// src/Corvus/AdminBundle/ILP/Entity/ITableView.php
namespace Corvus\AdminBundle\ILP\Entity;


/**
 * Interface which defines static methods that xTableView must implement to comform with TableViewController.
 * 
 * @see \Corvus\AdminBundle\ILP\Controller\TableViewController
 */
interface ITableView
{
    /**
     * Returns the DataName of the Entity the xTableView hold, e.g. education.
     * 
     * @return string The DataName of the Entity
     */
    public static function getDataName();
    
    /**
     * Returns the TypeName of the xTableViewEntity that relates to the Entity e.g. educationTableView
     * 
     * @return string The TypeName of the xTableView Entity
     */
    public static function getTypeName();
}