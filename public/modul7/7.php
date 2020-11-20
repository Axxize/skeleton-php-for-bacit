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
$sql = "SELECT * FROM Medlemmer WHERE Betalt = ? ORDER BY ? DESC LIMIT ?";

// Steg 1: forbereder spørringen
$stmt = $tilkobling->prepare( $sql );

// Steg 2: kobler parametrene våre med SQL-spørringens struktur
$stmt->bind_param( "isi", $betalt, $sortering, $begrensning );

// Steg 3: setter parametre, utfører spørringen og henter resultatet
$betalt = 1;
$sortering = "etternavn";
$begrensning = 10;
$stmt->execute();
$resultat = $stmt->get_result();
?>
<html>
    <head>
        <title>Medlemmer</title>
    </head>

    <body>
    <!-- Lager en tabell som viser medlemmene i databasen -->
    <table>
    <tr>
        <th>ID</th>
        <th>Fornavn</th>
        <th>Etternavn</th>
    </tr>
    <?php 
    /* Henter en rad om gangen fra databasen (dvs. ett og ett medlem)
       Det legges til ett <tr>-element for hvert nytt medlem
     */
    while( $row = $resultat->fetch_assoc() ) {
    ?>
    <tr>
        <td><?php echo $row['ID']; ?></td>
        <td><?php echo $row['Fornavn']; ?></td>
        <td><?php echo $row['Etternavn']; ?></td>
    </tr>
    <?php
    }
    // Lukk spørring 
    $stmt->close();
    ?>
    </table>
    <?php 
    // Avslutt databasetilkobling 
    $tilkobling->close();
    ?>
    
<?php
// Lager SQL-spørringens struktur /
$sql = "INSERT INTO Medlemmer (Fornavn, Etternavn, Epost, Gateadresse, Postnr, Poststed) VALUES (?, ?, ?, ?, ?, ?)";

// Steg 1: forbereder spørringen 
$stmt = $tilkobling->prepare( $sql );

//Steg 2: kobler parametrene våre med SQL-spørringens struktur 
$stmt->bind_param( "ssssii", $Fornavn, $Etternavn, $Epost, $Gateadresse, $Postnr, $Poststed );

// Steg 3: setter parametre og utfører spørringen og henter resultatet /
$Fornavn    = 'Johan';
$Etternavn  = 'Johansen';
$Epost      = 'Johansen@domene.no';
$Gateadresse= 'Brogata';
$Postnr     = 1111;
$Poststed   = 'landet';

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
$sql = "UPDATE Medlemmer SET epost = ? WHERE ID = ?";

// Steg 1: forbereder spørringen 
$stmt = $tilkobling->prepare( $sql );

// Steg 2: kobler parametrene våre med SQL-spørringens struktur 
$stmt->bind_param( "si", $epost, $ID );

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
$sql = "UPDATE Medlemmer SET epost = ? WHERE ID = ?";

// Steg 1: forbereder spørringen 
$stmt = $tilkobling->prepare( $sql );

// Steg 2: kobler parametrene våre med SQL-spørringens struktur /
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
<?php
// Definerer konstanter for å koble til databasen /
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
$sql = "DELETE FROM Medlemmer WHERE ID = ? && betalt = ?";

// Steg 1: forbereder spørringen 
$stmt = $tilkobling->prepare( $sql );

// Steg 2: kobler parametrene våre med SQL-spørringens struktur 
$stmt->bind_param( "ii", $ID, $betalt );

// Steg 3: setter parametre og utfører spørringen og henter resultatet 
$ID = 3;
$betalt = 1;

if ( $stmt->execute() )
{
    echo 'Medlemmet er slettet i databasen. Sjekk det ut!';
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
    