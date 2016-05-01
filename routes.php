<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
	case 'home':
		if(isset($_SESSION['contactForm'])){
			$contactForm = $_SESSION['contactForm'];
		} else {
			$_SESSION['contactForm'] = NULL;
			$contactForm = [
				'name' => "",
				'email' => "",
				'subject' => "",
				'message' => ""
			];
		}
		require "classes/HomeView.php";
		$view = new HomeView($contactForm);
		$view->render();
		break;


	case 'info':
		require "classes/InfoView.php";
		$view = new InfoView();
		$view->render();
		break;


	case 'contactForm':

		$_SESSION['contactFormError'] = NULL;
		$contactForm = [];

		$expectedVariables = ['name', 'email', 'subject', 'message'];

		foreach ($expectedVariables as $variable) {
			if(isset($_POST[$variable])){
				$contactForm[$variable] = $_POST[$variable];
			}else {
				$contactForm[$variable] = "";
			}
		}
		//validating form

		$error = false;

		if(strlen($contactForm['name']) == 0) {
			$error = true;
		}

		if(! filter_var($contactForm['email'], FILTER_VALIDATE_EMAIL)){
			$error = true;
		}

		if(strlen($contactForm['subject']) == 0) {
			$error = true;
		}

		if(strlen($contactForm['message']) == 0) {
			$error = true;
		}

		if( $error === true){
			$_SESSION['contactFormError'] = true;
			$_SESSION['contactForm'] = $contactForm;
			header("Location:./");
			exit();
		}
		echo "Successfully sent message.";
		break;
	
	default:
		echo "404";
		break;
}

