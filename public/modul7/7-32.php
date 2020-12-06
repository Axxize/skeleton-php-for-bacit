<!DOCTYPE html>
<html>
    <body>
<form action="7-32.php" method="post">
    <input type="text" id=fornavn name="fornavn" placeholder="Fornavn" value="<?php echo $_POST['fornavn']; ?>">
    <br>
    <input type="text" id=etternavn name="etternavn" placeholder="Etternavn" value="<?php echo $_POST['etternavn']; ?>">
    <br>
    <input type="text" id=epost name="epost" placeholder="Epost" value="<?php echo $_POST['epost']; ?>">
    <br>
    <input type="text" id=telefonnummer name="telefonnummer" placeholder="Telefonnummer" value="<?php echo $_POST['telefonnummer']; ?>">
    <br>
    <input type="text" id=gateadresse name="gateadresse" placeholder="Gatedresse" value="<?php echo $_POST['gateadresse']; ?>">
    <br>
    <input type="text" id=postnr name="postnr" placeholder="Postnr" value="<?php echo $_POST['postnr']; ?>">
    <br>
    <input type="text" id=poststed name="poststed" placeholder="Poststed" value="<?php echo $_POST['poststed']; ?>">
    <br>
    <!--<input type="text" id=betalt name="betalt" placeholder="Betalt" value="<?php echo $_POST['betalt']; ?>"> -->
    <br>
    <input type="text" id=interesse1 name="interesse1" placeholder="interesse1" value="<?php echo $_POST['interesse1']; ?>">
    <br>
    <input type="text" id=interesse2 name="interesse2" placeholder="interesse2" value="<?php echo $_POST['interesse2']; ?>">
    <br>
    Betalt? 
    1 = ja, 0 = nei
    <br>
    <input type="text" id=paid name="paid" placeholder="Betalt" value="<?php echo $_POST['paid']; ?>"> 

<?php
    if(isset($_POST['submit']))
        {
            $melding = array();

            $info = array('Fornavn: ' => $_POST['fornavn'], 'Etternavn: ' => $_POST['etternavn'], 'Epost: ' => $_POST['epost'], 
            'Telefonnummer: ' => $_POST['telefonnummer'], 'Gateadresse: ' => $_POST['gateadresse'], 'Postnummer: ' => $_POST['postnummer'],
            'Poststed: ' => $_POST['poststed'], 'Betalt: ' => $_POST['betalt'], 'Interesse1: ' => $_POST['interesse1'],
            'Interesse2' => $_POST['interesse2']);

            if(empty($_POST['fornavn']))
            {
                $melding[] = 'Du må fylle inn fornavn';
            }
            if(empty($_POST['etternavn']))
            {
                $melding[] = 'Du må fylle inn etternavn';
            }
            if(empty($_POST['epost']))
            {
                $melding[] = 'Du må fylle inn epost';
            }
            if(empty($_POST['telefonnummer']))
            {
                $melding[] = 'Du må fylle inn telefonnummer';
            }
            if(empty($_POST['gateadresse']))
            {
                $melding[] = 'Du må fylle inn gateadresse';
            }
            if(empty($_POST['postnummer']))
            {
                $melding[] = 'Du må fylle inn postnummer';
            }
            if(empty($_POST['poststed']))
            {
                $melding[] = 'Du må fylle inn poststed';
            }
            if(empty($_POST['betalt']))
            {
                $melding[] = 'Du må fylle inn betalt';
            }
            if(empty($_POST['interesse1']))
            {
                $melding[] = 'Du må fylle inn interesse1';
            }
            if(empty($_POST['interesse2']))
            {
                $melding[] = 'Du må fylle inn interesse2';
            }
            
        } 
?>
<br>
    <button> Lagre informasjon </button>
</form>
</body>

<?php
#3 Setter paramtere og utfører spørring. Henter resultat. 
if(isset($_POST['submit'])) {
$Fornavn =          $_POST['fornavn'];
$Etternavn =        $_POST['etternavn'];
$Epost =            $_POST['epost'];
$Mobilnummer =      $_POST['telefonnummer'];
$Gateadresse =      $_POST['gateadresse'];
$Postnummer =       $_POST['postnr'];
$Poststed =         $_POST['Poststed'];
$Betalt =           (int)$_POST['paid'];
$Interesse1 =       $_POST['Interesse1'];
$Interesse2 =       $_POST['Interesse2'];




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
$sql = "INSERT INTO Medlemmer (Fornavn, Etternavn, Epost, Telefonnummer, Gateadresse, 
Postnr, Poststed, Betalt, Interesse1, Interesse2) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Steg 1: forbereder spørringen 
$stmt = $tilkobling->prepare( $sql );

//Steg 2: kobler parametrene våre med SQL-spørringens struktur 
$stmt->bind_param( "sssisiiiss", $Fornavn, $Etternavn, $Epost, $Telefonnummer, $Gateadresse, $Postnr, $Poststed, $Betalt, $Interesse1, $Interesse2 );

// Steg 3: setter parametre og utfører spørringen og henter resultatet /
$Fornavn    = 'Solfrid';
$Etternavn  = 'Grein';
$Epost      = 'Solfrid@domene.no';
$Telefonnummer = '33445566';
$Gateadresse= 'Lønneveien';
$Postnr     = 3600;
$Poststed   = 'Gran';
$Betalt     = 0; //skriv inn 1 dersom betalt, skriv 0 hvis ikke betalt
$Interesse1 = "Golf";
$Interesse2 = "Fotball";

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
}
?>