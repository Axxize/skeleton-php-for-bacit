<?php
// Definerer konstanter for å koble til databasen
define('MYSQL_VERT', 'db');
define('MYSQL_BRUKER', 'dbuser');
define('MYSQL_PASSORD', 'BACIT2020');
define('MYSQL_DB', 'ergotests');

// Kobler til database med oppkoblingsdata 
$tilkobling = new mysqli( MYSQL_VERT, MYSQL_BRUKER, MYSQL_PASSORD, MYSQL_DB );
if ( $tilkobling->connect_error )
{
    die('Tilkoblingen til databasen feilet. Vennligst forsøk igjen senere.');
    exit();
}

// Lager SQL-spørringens struktur /
$sql = "INSERT INTO Medlemmer (Fornavn, Etternavn, Epost, Telefonnummer, Gateadresse, Postnr, Poststed, Betalt) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

// Steg 1: forbereder spørringen 
$stmt = $tilkobling->prepare( $sql );

//Steg 2: kobler parametrene våre med SQL-spørringens struktur 
$stmt->bind_param( "sssisiii", $Fornavn, $Etternavn, $Epost, $Telefonnummer, $Gateadresse, $Postnr, $Poststed, $Betalt );

// Steg 3: setter parametre og utfører spørringen og henter resultatet /
$Fornavn    = 'Simen';
$Etternavn  = 'Alnæs';
$Epost      = 'Simen@domene.no';
$Telefonnummer = '33333333';
$Gateadresse= 'furuveien';
$Postnr     = 3440;
$Poststed   = 'Søm';
$Betalt     = 1; //skriv inn 1 dersom betalt, skriv 0 hvis ikke betalt

if ( $stmt->execute() )
{
    echo 'Medlemmet er registrert i databasen. Sjekk det ut!';
}
else
{
    echo 'Dette gikk åt skogen: ' . $tilkobling->error;
}

// Lukk spørring 
$stmt->close();

// Avslutt databasetilkobling 
$tilkobling->close();
?>