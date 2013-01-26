<?php

// src/Corvus/AdminBundle/Model/ChangePasswordModel.php
namespace Corvus\AdminBundle\Model;

class ChangePasswordModel {
	protected $current_password;
	protected $new_password;
	protected $confirm_password;

	public function getCurrentPassword()
	{
		return $this->current_password;
	}

	public function setCurrentPassword($currentPassword)
	{
		$this->current_password = $currentPassword;
	}

	public function getNewPassword()
	{
		return $this->new_password;
	}

	public function setNewPassword($newPassword)
	{
		$this->new_password = $newPassword;
	}

	public function getConfirmPassword()
	{
		return $this->confirm_password;
	}

	public function setConfirmPassword($confirmPassword)
	{
		$this->confirm_password = $confirmPassword;
	}
}