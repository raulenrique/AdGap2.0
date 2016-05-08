<?php

namespace App\Controllers;

use App\Views\ListingsView;
use App\Models\Listings;
use App\Views\IndividualListingView;
use App\Views\ListingCreateView;


class ListingsController 
{

	public function index()
	{
		$listings = Listings::all("title");
		$view = new ListingsView(['listings' => $listings]);
		$view->render();
	}

	public function show()
	{
		$listing = new Listings((int)$_GET['id']);
		$view = new IndividualListingView(['listing' => $listing]);
		$view->render();
	}

	public function create()
	{
		$view = new ListingCreateView();
		$view->render();
	}

	public function store()
	{
		var_dump($_POST);
		$listing = new Listings($_POST);
		$Listing->save();

	}

}