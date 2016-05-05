<?php

namespace App\Controllers;

use App\Views\MessageSentSuccessView;

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
	case "home":
		
		$controller = new HomeController();
		$controller->show();
		break;

	case "listings":
		
		$controller = new ListingsController();
		$controller->show();
		break;

	case "info":
		
		$controller = new InfoController();
		$controller->show();
		break;

	case "contactForm":

		$controller = new ContactFormController();
		$controller->show();
		break;

		case "messageSentSuccess":
			
		$view = new MessageSentSuccessView();
		$view->render();
		break;

		default:
			echo "404";
		
}

