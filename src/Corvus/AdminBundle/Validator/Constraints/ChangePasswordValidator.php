<?php

// src/Corvus/AdminBundle/Validator/Constraints/ChangePasswordValidator.php
namespace Corvus\AdminBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\ExecutionContext;

use Symfony\Component\DependencyInjection\ContainerInterface;

class ChangePasswordValidator extends ConstraintValidator
{
	protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function validate($changePassword, Constraint $constraint)
    {
    	if($changePassword->getCurrentPassword())
    	{
    		$securityContext = $this->container->get('security.context');
    		$currentUserPword = $this->container->get('security.context')->getToken()->getUser()->getPassword();
    		$currentPassword = sha1($changePassword->getCurrentPassword());

    		if($currentUserPword != $currentPassword)
    		{
    			$this->context->addViolationAtSubPath('current_password', $constraint->oldPasswordNotMatchMessage, array(), null);
                return false;
    		}

	        if ($changePassword->getNewPassword() != $changePassword->getConfirmPassword()) {
	            $this->context->addViolationAtSubPath('new_password', $constraint->newPasswordNotMatchMessage, array(), null);
                return false;
	        }
    	}

        return true;
    }
}