<?php

use Mailgun\Mailgun;

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
	case 'home':
		if(isset($_SESSION['contactForm'])){
			$contactForm = $_SESSION['contactForm'];
		} else {
			session_regenerate_id(true);
			$contactForm = [
				'name' => "",
				'email' => "",
				'subject' => "",
				'message' => "",
				'errors'=> [
					'name' => "",
					'email' => "",
					'subject' => "",
					'message' => ""
				 ]
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
		$_SESSION['contactForm'] = NULL;
		$contactForm = [
							'errors' => []

						];

		$expectedVariables = ['name', 'email', 'subject', 'message'];

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

		// if(strlen($contactForm['name']) == 0) {
		// 		  $contactForm['errors']['title']= "Enter your first and last name";
		// 		  $error = true;
		// }

		// if(! filter_var($contactForm['email'], FILTER_VALIDATE_EMAIL)){
		// 		  $contactForm['errors']['email']= "Please re-enter your e-mail address";
		// 	      $error = true;
		// }

		// if(strlen($contactForm['subject']) == 0) {
		// 		  $contactForm['errors']['subject']= "Enter a subject for your message";
		// 		  $error = true;
		// }

		// if(strlen($contactForm['message']) == 0) {
		// 		  $contactForm['errors']['message']= "Please include your message";
		// 		  $error = true;
		// }

		if( $error === true){
			$_SESSION['contactFormError'] = true;
			$_SESSION['contactForm'] = $contactForm;
			header("Location:./#contactForm");
			exit();
		}
		
		# Instantiate the client.
		$mg = new Mailgun('key-a9900123a26bc6efb032d856bd67dd68');
		$domain = "sandboxd2842aacb2ef4e158929328ba8ce797f.mailgun.org";

		# Make the call to the client.
		$result = $mg->sendMessage($domain, array(
		    'from'    => 'TheAdGap<mailgun@sandboxd2842aacb2ef4e158929328ba8ce797f.mailgun.org>',
		    'to'      => '<'.$contactForm['email'].'>',
		    'subject' => 'Thanks for your message about'.$contactForm['subject'],
		    'text'    => 'Thanks for your message about'.$contactForm['subject']. '. We will review your message shortly and get back to you very soon. Have a gerat day!'
		));

header("Location:./?page=messageSentSuccess");

		break;

		case 'messageSentSuccess':
			require "classes/MessageSentSuccessView.php";
			$view = new MessageSentSuccessView();
			$view->render();
			break;


	default:
		echo "404";
		
}

