<?php

// src/Corvus/CoreBundle/Entity/ITableViewEntity.php
namespace Corvus\CoreBundle\Entity;


/**
 * Interface which defines static methods that xEntity must implement to comform with TableViewController.
 * 
 * @see \CorvusCoreBundle\Controller\TableViewController
 */
interface ITableViewEntity
{
    public static function getName();
    public static function getRepoName();
}