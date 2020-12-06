
<h1> Heisann hoppsann</h1>

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
?>

<html>
<form action="7-33.php" method="post">
<input type="text" id=Fornavn name="Fornavn" placeholder="Fornavn" value="<?php if( !empty( $_POST['Fornavn'] ) ) { echo $_POST['Fornavn']; }  ?>"required><br> 
<br>
<input type="text" id=Etternavn name="Etternavn" placeholder="Etternavn" value="<?php if( !empty( $_POST['Etternavn'] ) ) { echo $_POST['Etternavn']; }  ?>"required><br>
<br>
<input type="text" id=Epost name="Epost" placeholder="Epost" value="<?php if( !empty( $_POST['Epost'] ) ) { echo $_POST['Epost']; }  ?>"required><br>
<br>
<input type="text" id=Telefonnummer name="Telefonnummer" placeholder="Telefonnummer" value="<?php if( !empty( $_POST['Telefonnummer'] ) ) { echo $_POST['Telefonnummer']; }  ?>"required><br>
<br>
<input type="text" id=Gateadresse name="Gateadresse" placeholder="Gatedresse" value="<?php if( !empty( $_POST['Gateadresse'] ) ) { echo $_POST['Gateadresse']; }  ?>"required><br>
<br>
<input type="text" id=Postnr name="Postnr" placeholder="Postnr" value="<?php if( !empty( $_POST['Postnr'] ) ) { echo $_POST['Postnr']; }  ?>"required><br>
<br>
<input type="text" id=Poststed name="Poststed" placeholder="Poststed" value="<?php if( !empty( $_POST['Poststed'] ) ) { echo $_POST['Poststed']; }  ?>"required><br>
<br>
<input type="text" id=betalt name="Betalt" placeholder="Betalt" value="<?php if( !empty( $_POST['Betalt'] ) ) { echo $_POST['Betalt']; }  ?>"required><br> 
<br>
<input type="text" id=Interesse1 name="Interesse1" placeholder="Interesse1" value="<?php if( !empty( $_POST['Interesse1'] ) ) { echo $_POST['Interesse2']; }  ?>"required><br>
<br>
<input type="text" id=Interesse2 name="Interesse2" placeholder="Interesse2" value="<?php if( !empty( $_POST['Interesse2'] ) ) { echo $_POST['Interesse2']; }  ?>"required><br>
<br>
<button type="submit" value="submit" id="submit"> </button>
<br>
</html>
<?php

// Steg 3: setter parametre og utfører spørringen og henter resultatet /
$Fornavn            = $_POST['Fornavn'];
$Etternavn          = $_POST['Etternavn'];
$Epost              = $_POST['Epost'];
$Telefonnummer      = $_POST['Telefonnummer'];
$Gateadresse        = $_POST['Gateadresse'];
$Postnr             = $_POST['Postnr'];
$Poststed           = $_POST['Poststed'];
$Betalt             = $_POST['Betalt'];
$Interesse1         = $_POST['Interesse1'];
$Interesse2         = $_POST['Interesse2'];

// Lager SQL-spørringens struktur /
$sql = "INSERT INTO Medlemmer (Fornavn, Etternavn, Epost, Telefonnummer, Gateadresse, 
Postnr, Poststed, Betalt, Interesse1, Interesse2) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Steg 1: forbereder spørringen 
$stmt = $tilkobling->prepare( $sql );

//Steg 2: kobler parametrene våre med SQL-spørringens struktur 
$stmt->bind_param( "ssssiiiiss", $Fornavn, $Etternavn, $Epost, $Telefonnummer, $Gateadresse, 
$Postnr, $Poststed, $Betalt, $Interesse1, $Interesse2 );


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

// Lager SQL-spørringens struktur 
$sql = "UPDATE Medlemmer SET Epost = ? WHERE ID = ?";

// Steg 1: forbereder spørringen 
$stmt = $tilkobling->prepare( $sql );

// Steg 2: kobler parametrene våre med SQL-spørringens struktur 
$stmt->bind_param( "si", $Epost, $ID );

// Steg 3: setter parametre og utfører spørringen og henter resultatet 
$Epost      = 'silje@nyttdomene.no';
$ID         = 1;

if ( $stmt->execute() )
{
    echo 'Medlemmet er oppdatert i databasen. Sjekk det ut!';
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