<?php

namespace Corvus\AdminBundle\ILP\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
	Symfony\Component\HttpFoundation\Request;

abstract class AbstractTableViewController extends Controller
{
	/* Define Attributes that the grandchld of this class will need to instantiate
	 * Allows the child class of this to use them in the methods this class defines 
	 * */
	protected $_entity;
	protected $_formType;
	protected $_tableViewDataName;
	protected $_tableViewTypeName;

	// Define the common methods which all TableViewController will inherit
	abstract function newAction(Request $request);
	abstract function editAction($id, Request $request);
	abstract function orderUpAction($id);
	abstract function orderDownAction($id);
	abstract function deleteAction($id, Request $request);
}