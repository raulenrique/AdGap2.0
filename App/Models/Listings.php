<?php

namespace App\Models;

class Listings extends DatabaseModel
{
	
	protected static $tableName = "listings";
	protected static $columns = ['id', 'category', 'title', 'currentPrice', 'auctionEndDateTime', 'auctionStartDateTime', 'location', 'description'];
}