<?php

namespace App\Controllers;

use App\Views\RegisterFormView;
use App\Views\LoginFormView;
use App\Models\User;

class AuthenticationController 
{
	public function register()
	{
		$user = $this->getUserFormData();
		$view = new RegisterFormView(compact('user'));
		$view->render();
	}
	public function store()
	{
		$user = new User($_POST);
		if(! $user->isValid()){
			$_SESSION['user.form'] = $user;
			header("Location: .\?page=register");
			exit();
		}
		$user->save();
	}
	public function login()
	{
		$view = new LoginFormView();
		$view->render();
	}
	protected function getUserFormData($id = null)
	{
		if(isset($_SESSION['user.form'])){
			$user = $_SESSION['user.form'];
			unset($_SESSION['user.form']);
		} else {
			$user =new User($id); 
		}
		return $user;
	}
}