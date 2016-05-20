<?php

namespace App\Views;

class ListingCreateView extends TemplateView
{
	public function render()
	{
		extract($this->data);
		$page = "listing.create";
		$page_title = "Add New Listing";
		include "templates/master.inc.php";
	}

	public function content()
	{
		extract($this->data);
		include "templates/createlisting.inc.php";
	}

}

