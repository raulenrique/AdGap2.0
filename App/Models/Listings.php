<?php

namespace App\Models;

class Listings extends DatabaseModel
{
	
	protected static $tableName = "listings";
	protected static $columns = ['id', 'user_id','category', 'title','url', 'buyNowPrice', 'location', 'description'];
	protected static $validationRules = [
									"category"    => "minlength:1",
									"title"       => "minlength:1",
									"buyNowPrice" => "numeric",
									"location"    => "minlength:1",
									"description" => "minlength:10,maxlength:500",
	];
}