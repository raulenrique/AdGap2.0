<?php

$emailHeader = [
				# Make the call to the client.
	
		    'from'    => 'TheAdGap < mailgun@' .$domain. '>',
		    'to'      => '<'.$contactEmail.'>',
		    'subject' => 'The Ad Gap: Thanks for your message'
			];

?>


Thanks for your message about "<?php echo $contactMessage; ?>".
We will review your message shortly and get back to you very soon. 

Have a great day,

The Ad Gap Team