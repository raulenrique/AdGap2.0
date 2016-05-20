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

	public function paginate($url, $pageNumber, $pageSize, $recordCount)
	{
		$totalNumberOfPages = ceil($recordCount/$pageSize);
		$previousPage = $pageNumber - 1;
		$nextPage = $pageNumber + 1;

		$maxLinks = 5;

		//calculating the range of links
		$low = $pageNumber - floor($maxLinks / 2);
		if ($low < 2) { $low = 2; }

		$high = $pageNumber + floor($maxLinks / 2);
		if ($high > $totalNumberOfPages - 1) { $high = $totalNumberOfPages - 1; }

		// if low or high limit is hit, then adjust the links to suit them
		if ($low == 2) { $high = $maxLinks; }
		if ($high > $totalNumberOfPages - 1) { $high = $totalNumberOfPages - $maxLinks + 1; }

		if ($low < 2) { $low = 2; }
		if ($high > $totalNumberOfPages - 1) { $high = $totalNumberOdPages - 1; }

		include "templates/paginate.inc.php";

	}
}