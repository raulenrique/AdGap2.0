<?php

class MessageSentSuccessView
{
	public function __construct()
	{
		
	}
	public function render() 
	{
		$page = "messageSentSuccess";
		$page_title = "Message Successfuly sent!";
		include "templates/master.inc.php";
	}
	public function content()
	{
		include "templates/messageSentSuccess.inc.php";
	}
}