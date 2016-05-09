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
		$listing = $this->getFormdata();
		$view = new ListingCreateView(['listing' => $listing]);
		$view->render();
	}

	public function store()
	{
		$listing = new Listings($_POST);
		if (! $listing->isValid()) {
			$_SESSION['listing.create'] = $listing;
			header("Location: .\?page=listing.create");
			exit();
		}
		$listing->save();
		$_SESSION['listing.create'] = null;
		header("Location: .\?page=listing&id=" . $listing->id);
	}

	public function getFormdata()
	{
		if (isset($_SESSION['listing.create'])) {
				  $listing = $_SESSION['listing.create'];
				  unset($_SESSION['listing.create']);
		} else {
				$listing = new Listings;
		}
		return $listing;
	}
}