<?php

// src/Corvus/AdminBundle/ILP/Entity/ITableViewEntity.php
namespace Corvus\AdminBundle\ILP\Entity;


/**
 * Interface which defines static methods that xEntity must implement to comform with TableViewController.
 * 
 * @see \Corvus\AdminBundle\ILP\Controller\TableViewController
 */
interface ITableViewEntity
{
    public static function getName();
    public static function getRepoName();
}