<?php 

namespace App\Views;

class HostEmailView extends EmailView

{
	
	public function render()
	{
		$this->sendEmail("templates/hostemail.inc.php");
	}

}

?>