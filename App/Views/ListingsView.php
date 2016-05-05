<?php

namespace App\Views;

class ListingsView extends TemplateView
{
	
	public function render() 
	{
		extract($this->data);
		$page = "listings";
		$page_title = "Listings";
		include "templates/master.inc.php";
	}
	protected function content()
	{
		extract($this->data);
		include "templates/listings.inc.php";
	}
}