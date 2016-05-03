<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
	case "home":
		if(isset($_SESSION['contactForm'])){
			$contactForm = $_SESSION['contactForm'];
		} else {
			session_regenerate_id(true);
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
		
		$view = new HomeView(compact('contactForm'));
		$view->render();
		break;


	case "info":
		
		$view = new InfoView();
		$view->render();
		break;


	case "contactForm":


		$_SESSION['contactFormError'] = NULL;
		$_SESSION['contactForm'] = NULL;
		$contactForm = [
							'errors' => []

						];

		$expectedVariables = ['contactName', 'contactEmail', 'contactSubject', 'contactMessage'];

		foreach ($expectedVariables as $variable) {
			
			$contactForm['errors'][$variable]="";

			if(isset($_POST[$variable])){
				
				$contactForm[$variable] = $_POST[$variable];
			}else {
				$contactForm[$variable] = "";
			}
		}
		
		
		//validating form

		$error = false;

		if(strlen($contactForm['contactName']) == 0) {
				  $contactForm['errors']['contactName']= "Enter your first and last name";
				  $error = true;
		}

		if(! filter_var($contactForm['contactEmail'], FILTER_VALIDATE_EMAIL)){
				  $contactForm['errors']['contactEmail']= "Please re-enter your e-mail address";
			      $error = true;
		}

		if(strlen($contactForm['contactSubject']) == 0) {
				  $contactForm['errors']['contactSubject']= "Enter a subject for your message";
				  $error = true;
		}

		if(strlen($contactForm['contactMessage']) == 0) {
				  $contactForm['errors']['contactMessage']= "Please include your message";
				  $error = true;
		}

		if( $error === true){
			$_SESSION['contactFormError'] = true;
			$_SESSION['contactForm'] = $contactForm;
			header("Location:./#contactForm");
			exit();
		}

		//form is valid so redirect the user to a success pgae
		//header("Location:./?page=messageSentSuccess");

		//send email to the person sending the message
		
		$messageSender = new MessageSenderView($contactForm);
		$messageSender->render();

		//send email to the host
		
		$hostEmail = new HostEmailView($contactForm);
		$hostEmail->render();

		exit();

		break;

		case "messageSentSuccess":
			
			$view = new MessageSentSuccessView();
			$view->render();
			break;


		default:
			echo "404";
		
}

