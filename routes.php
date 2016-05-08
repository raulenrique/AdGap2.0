<?php

namespace App\Controllers;

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
	case "home":
		
		$controller = new HomeController();
		$controller->show();
		break;

	case "listings":
		
		$controller = new ListingsController();
		$controller->index();
		break;

	case "listing":
		
		$controller = new ListingsController();
		$controller->show();
		break;

	case "listing.create":
		
		$controller = new ListingsController();
		$controller->create();
		break;

	case "listing.store":
		
		$controller = new ListingsController();
		$controller->store();
		break;


	case "info":
		
		$controller = new InfoController();
		$controller->show();
		break;

	case "contactForm":

		$controller = new ContactFormController();
		$controller->show();
		break;


		default:
			echo "404";
		
}

