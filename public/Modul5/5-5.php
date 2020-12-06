<?php
/* Hent etternavn via GET */
if ( $_GET['send'] == 'ja' )
{
	$to      = 'aleksgresseth@hotmail.com';
	$subject = 'E-post til meg selv';
	$message = 'Hei og hopp din fluesopp!';
	$headers = array(
		'From' => 'aleksgresseth@hotmail.com',
		'Reply-To' => 'aleksgresseth@hotmail.com',
		'X-Mailer' => 'PHP/' . phpversion()
	);

	mail( $to, $subject, $message, $headers );
}
else
{
	echo "Du må oppgi om du vil sende e-post via en GET-variabel (send=ja)";
}
?>