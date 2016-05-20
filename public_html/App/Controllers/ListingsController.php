<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Models\Listings;
use App\Views\ListingsView;
use App\Views\IndividualListingView;
use App\Views\ListingCreateView;


class ListingsController extends Controller 
{

	public function index()
	{	//User Input
		$pageNumber = isset($_GET['p']) ? (int)$_GET['p'] : 1;
		// $pageSize = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['page'] : 5;
		$pageSize = 4;
		$recordCount = Listings::count();

		$listings = Listings::all("title",true, $pageNumber, $pageSize);
		$view = new ListingsView(compact('listings', 'pageNumber', 'pageSize','recordCount'));
		$view->render();
	}

	public function show()
	{
		$listing = new Listings((int)$_GET['id']);
		$newcomment = $this->getCommentFormData();
		$comments = $listing->comments();
		$tags = $listing->getTags();
		$permit = false;
		$user = static::$auth->user();
		if(isset($user)){
			
			if($listing->user_id == $user->id) {
				$permit = true;
			} 
			
		}

		$view = new IndividualListingView(compact('listing', 'permit', 'newcomment', 'comments','tags'));
		$view->render();
	}

	public function create()
	{	
		static::$auth->isAdmin();
		static::$auth->mustBeRegisteredUser();
		$user = static::$auth->user();
		$listing = $this->getFormdata();
		$view = new ListingCreateView(compact('listing', 'user'));
		$view->render();
	}

	public function store()
	{
		static::$auth->isAdmin();
		static::$auth->mustBeRegisteredUser();
		$listing = new Listings($_POST);

		if(is_array($listing->tags)){
			$listing->tags = implode(",", $listing->tags);
		}
		
		if (! $listing->isValid()) {
			$_SESSION['listing.create'] = $listing;
			header("Location: .\?page=listing.create");
			exit();
		}
		$listing->save();
		$listing->saveTags();
		header("Location: .\?page=listing&id=" . $listing->id);
	}

	public function edit()
	{
		static::$auth->isAdmin();
		static::$auth->mustBeRegisteredUser();
		$user = static::$auth->user();

		$listing = $this->getFormData($_GET['id']);
		$listing->loadTags();
		$view = new ListingCreateView(compact('listing', 'user'));
		$view->render();
	}

	public function update()
	{
		static::$auth->isAdmin();
		static::$auth->mustBeRegisteredUser();
		$listing = new Listings($_POST['id']);
		$listing->processArray($_POST);
		
		if(is_array($listing->tags)){
			$listing->tags = implode(",", $listing->tags);
		}

		if(! $listing->isValid()){
			$_SESSION['listing.create'] = $listing;
			header("Location: .\?page=listing.edit&id=".$_POST['id']);
			exit();
		}
		$listing->save();
		$listing->saveTags();
		header("Location: .\?page=listing&id=" . $listing->id);
	}

	public function destroy()
	{	
		static::$auth->isAdmin();
		static::$auth->mustBeRegisteredUser();
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

	public function getCommentFormData($id = null){
		if(isset($_SESSION['comment.form'])){
			$newcomment = $_SESSION['comment.form'];
			unset($_SESSION['comment.form']);
		} else {
			$newcomment = new Comment((int)$id);
		}
		return $newcomment;
	}
}