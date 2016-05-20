<?php

namespace App\Models;

class Tags extends DatabaseModel
{
	protected static $tableName = "tags";
	protected static $columns = ['id','tag'];
	protected static $validationRules = [ "tag" => "inputValidate, minlength:1"
];
	
}