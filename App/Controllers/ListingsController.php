<?php

namespace App\Controllers;

use App\Views\ListingsView;
use App\Models\Listings;

class ListingsController 
{
	public function show()
	{
		$listings = Listings::all();
		
		$view = new ListingsView(['listings' => $listings]);
		$view->render();
	}
}