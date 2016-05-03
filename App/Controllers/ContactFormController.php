<?php

namespace App\Controllers;

use App\Views\MessageSenderView;
use App\Views\HostEmailView;
use App\Views\MessageSentSuccessView;



class ContactFormController
{
	private $contactForm = [];
	
	public function __construct()
	{
		$this->contactForm = [
						'errors' => []
						];
	}
	public function resetSessionData()
	{
		$_SESSION['contactFormError'] = NULL;
		$_SESSION['contactForm'] = NULL;
		
	}
	public function getFormData() 
	{
		$expectedVariables = ['contactName', 'contactEmail', 'contactSubject', 'contactMessage'];

		foreach ($expectedVariables as $variable) {

			// assume no errors
			$this->contactForm['errors'][$variable]="";

			if(isset($_POST[$variable])){
				$this->contactForm[$variable] = $_POST[$variable];
			}else {
				$this->contactForm[$variable] = "";
			}
		}

	}
	public function isFormValid()
	{
		//validating form
		$valid = true;

		if(strlen($contactForm['contactName']) == 0) {
				  $contactForm['errors']['contactName']= "Enter your first and last name";
				  $valid = false;
		}

		if(! filter_var($contactForm['contactEmail'], FILTER_VALIDATE_EMAIL)){
				  $contactForm['errors']['contactEmail']= "Please re-enter your e-mail address";
			      $valid = false;
		}

		if(strlen($contactForm['contactSubject']) == 0) {
				  $contactForm['errors']['contactSubject']= "Enter a subject for your message";
				  $valid = false;
		}

		if(strlen($contactForm['contactMessage']) == 0) {
				  $contactForm['errors']['contactMessage']= "Please include your message";
				  $valid = false;
		}
		return $valid;
	}

	public function show()
	{
		$this->resetSessionData();

		//capture suggester data
		$this->getFormData();

		//validate form data
		if(! $this->isFormValid()){
			$_SESSION['contactForm'] = $this->contactForm;
			header("Location:./#contactForm");
			return;
		}

		// form is valid, and so redirect the user to a success page
		header("Location:./?page=contactFormsuccess");

		//send email to the person sending the message
		
		$messageSender = new MessageSenderView($contactForm);
		$messageSender->render();

		//send email to the host
		
		$hostEmail = new HostEmailView($contactForm);
		$hostEmail->render();



	}
}
