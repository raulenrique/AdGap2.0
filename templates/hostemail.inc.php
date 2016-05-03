<?php

$emailHeader = [
				# Make the call to the client.
	
		    'from'    => 'TheAdGap < mailgun@' .$domain. '>',
		    'to'      => '<assin.testmail@gmail.com>',
		    'subject' => 'The Ad Gap: Thanks for your message'
			];

?>


Hi Team, 

A message has been sent by "<? php echo $contactName;?>". This is regarding "<?php php echo $contactSubject;?>".
Please reply to the below message as soon as you can.

Cheers.

"<?php echo $contactMessage;?>"
