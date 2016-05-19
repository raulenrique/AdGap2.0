<?php

namespace App\Models;

class Comment extends DatabaseModel
{

    protected static $columns = ['id', 'user_id', 'listing_id', 'created', 'comment'];

    protected static $tableName = "comments";

    protected static $validationRules = [
    			'user_id' => 'numeric,exists:\App\Models\User',
    			'listing_id'=> 'numeric,exists:\App\Models\Listings',
    			'comment' => 'minlength:10,maxlength:1600'
    ];

    public function user()
    {
    	return new User($this->user_id);
    }

    
}