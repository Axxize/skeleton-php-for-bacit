<html>
<!doctype html>
<head>
<meta charset="utf-8">
</head>

<title>Modul 5-5</title>
<h2>Sending av mail</h2> 
<body>

<?php
$fra = 'aleksh17@uia.no';
$til = 'aleksgresseth@gmail.com';
$emne = 'PHP mail testing';
$melding = 'Hei og hopp din fluesopp!';

$headers = 'From' . $fra . "\r\n" . 
'reply-to: aleksh17@uia.no' . "\r\n" .
'X-Mailer: PHP/' . phpversion();

mail($til,$emne,$melding, $headers);
var_dump(mail($til,$emne,$melding, $headers));

?>
