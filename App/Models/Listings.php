<?php

namespace App\Models;

class Listings extends DatabaseModel
{
	
	protected static $tableName = "listings";
	protected static $columns = ['id', 'category', 'title', 'url', 'buyNowPrice', 'auctionEndDateTime', 'auctionStartDateTime', 'location', 'description'];
	protected static $validationRules = [
									"category"    => "minlength:1",
									"title"       => "minlength:1",
									"buyNowPrice" => "numeric,between:0,99.99",
									"category"    => "location:1",
									"description" => "minlength:10,maxlength:500"
	];
}