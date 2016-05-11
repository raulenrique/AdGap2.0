<?php

namespace App\Models;

class User extends DatabaseModel
{
	protected static $tableName = "users";
	protected static $columns = ['id','email','password','role'];
	protected static $smartColumns = ['password2'];
	protected static $validationRules = [
					"email" 		=> "email,unique:App\Models\User",
					"password" 		=> "minlength:6",
					"password2" 	=> "match:password"

	];
	function __construct($input = null)
	{
		parent::__construct($input);
		if($this->role === null){
			$this->role = 'user';
		}
	}
	
}