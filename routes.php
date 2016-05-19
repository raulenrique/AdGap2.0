<?php

namespace App\Controllers;
use App\Models\Exceptions\ModelNotFoundException;
use App\Services\Exceptions\InsufficientPrivilegesException;

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

try{	

		switch ($page) {
			case "home":
				
				$controller = new HomeController();
				$controller->show();
				
				break;

			case "register":
			
				$controller = new AuthenticationController();
				$controller->register();

				break;

			case "auth.store":
			
				$controller = new AuthenticationController();
				$controller->store();

				break;

			case "login":
			
				$controller = new AuthenticationController();
				$controller->login();

				break;
			
			case "auth.attempt":

				$controller = new AuthenticationController();
				$controller->attempt();

				break;

			case "logout":

				$controller = new AuthenticationController();
				$controller->logout();

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

			case "comment.create":

	            $controller = new CommentsController();
	            $controller->create();

            break;
				
			}
			
} catch (ModelNotFoundException $e)

{
	$controller = new ErrorController();
	$controller->error404();

} catch (InsufficientPrivilegesException $e)

{
	$controller = new ErrorController();
	$controller->error401();
}
