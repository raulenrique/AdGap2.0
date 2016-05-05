<?php

namespace App\Views;

class MessageSentSuccessView extends TemplateView
{

	public function render() 
	{
		$page = "messageSentSuccess";
		$page_title = "Message Successfuly sent!";
		include "templates/master.inc.php";
	}
	protected function content()
	{
		include "templates/messagesentsuccess.inc.php";
	}
}