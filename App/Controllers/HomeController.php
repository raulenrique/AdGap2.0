<?php

namespace App\Controllers;

use App\Views\HomeView;

class HomeController
{
	public function show()
	{
		$contactForm = $this->getContactFormData();

		$view = new HomeView($contactForm);
		$view->render();
	}
	public function getContactFormData()
	{
		if(isset($_SESSION['contactForm'])){
			$contactForm = $_SESSION['contactForm'];
		} else {
			$contactForm = [
				'contactName' => "",
				'contactEmail' => "",
				'contactSubject' => "",
				'contactMessage' => "",
				'errors'=> [
					'contactName' => "",
					'contactEmail' => "",
					'contactSubject' => "",
					'contactMessage' => ""
				 ]
			];
		}
		return $moviesuggest;
	}
}