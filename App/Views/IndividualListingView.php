<?php 

namespace App\Views;

class IndividualListingView extends TemplateView
{
	
	public function render()
	{
		extract($this->data);
		$page = "listing";
		$page_title = $listing->title;
		include "templates/master.inc.php";

	}
	protected function content()
	{

		extract($this->data);
		include "templates/individuallisting.inc.php";

	}


}
 ?>