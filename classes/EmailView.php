<?php 

use Mailgun\Mailgun;

abstract class EmailView extends View
{

	public function sendEmail($templateFile)
	{
		
		extract($this->data);
		# Instantiate the client.
		$mg = new Mailgun('key-a9900123a26bc6efb032d856bd67dd68');
		$domain = "sandboxd2842aacb2ef4e158929328ba8ce797f.mailgun.org";

		ob_start();

		include $templateFile;

		$emailBody = ob_get_clean();

			# Make the call to the client.
			$result = $mg->sendMessage($domain, array(
		   	'from' => $emailHeader['from'],
		   	'to' => $emailHeader['to'],
		   	'subject' => $emailHeader['subject'],
		   	'text' => $emailBody

		    ));

	}

}

?>