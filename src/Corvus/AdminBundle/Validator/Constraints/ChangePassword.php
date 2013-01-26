<?php

// src/Corvus/AdminBundle/Validator/Constraints/ChangePassword.php
namespace Corvus\AdminBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ChangePassword extends Constraint
{
	public $oldPasswordNotMatchMessage = "The current password entered does not match the logged in user's password";
    public $newPasswordNotMatchMessage = 'The new and confirm passwords do not match';

    public function getTargets()
	{
	    return self::CLASS_CONSTRAINT;
	}

	public function validatedBy()
	{
	    return 'cpassword_validator';
	}
}