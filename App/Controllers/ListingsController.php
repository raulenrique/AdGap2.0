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
		header("Location: .\?page=listing&id=" . $listing->id);
	}

	public function edit()
	{
		$listing = $this->getFormData($_GET['id']);
		$view = new ListingCreateView(compact('listing'));
		$view->render();
	}

	public function update()
	{
		$listing = new Listings($_POST['id']);
		$listing->processArray($_POST);
		var_dump($listing);
		if(! $listing->isValid()){
			$_SESSION['listing.create'] = $listing;
			header("Location: .\?page=listing.edit&id=".$_POST['id']);
			exit();
		}
		$listing->save();
		header("Location: .\?page=listing&id=" . $listing->id);
	}

	public function destroy()
	{
		Listings::destroy($_POST['id']);
		header("Location: .\?page=listings");
	}

	public function getFormdata($id=null)
	{
		if (isset($_SESSION['listing.create'])) {
				  $listing = $_SESSION['listing.create'];
				  unset($_SESSION['listing.create']);
		} else {
				$listing = new Listings((int)$id);
		}
		return $listing;
	}
}