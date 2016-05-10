<?php

namespace App\Controllers;
use App\Models\Exceptions\ModelNotFoundException;

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

try{	

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

			case "listing.edit":

				$controller = new ListingsController();
				$controller->edit();

				break;

			case "listing.update":

				$controller = new ListingsController();
				$controller->update();

				break;
				
			case "listing.destroy":

				$controller = new ListingsController();
				$controller->destroy();

				break;	

			case "info":
				
				$controller = new InfoController();
				$controller->show();
				break;

			case "contactForm":

				$controller = new ContactFormController();
				$controller->show();
				break;
				
			}
			
	} catch (ModelNotFoundException $e)

{
	$controller = new Error404Controller();
	$controller->error404();
}
