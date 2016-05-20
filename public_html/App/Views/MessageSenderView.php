<?php 

namespace App\Views;

class MessageSenderView extends EmailView

{
	
	public function render()
	{
		$this->sendEmail("templates/messagesender.inc.php");
	}
	
}

?>