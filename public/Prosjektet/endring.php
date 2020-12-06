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
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
    <tr>
        <th>ID</th>
        <th>Fornavn</th>
        <th>Etternavn</th>
        <th>Epost</th>
        <th>Telefonnummer</th>
        <th>Gateadresse</th>
        <th>Postnr</th>
        <th>Poststed</th>
        <th>Betalt</th>
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
        <td><?php echo $row['Epost']; ?></td>
        <td><?php echo $row['Telefonnummer']; ?></td>
        <td><?php echo $row['Gateadresse']; ?></td>
        <td><?php echo $row['Postnr']; ?></td>
        <td><?php echo $row['Poststed']; ?></td>
        <td><?php echo $row['Betalt']; ?></td>
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
    /*
        Det som må gjøres for at dette skal funke er å sette inn en $_SESSION som kobler seg opp til brukerID, 
        slik at når man henter ned brukerinfo skal det bare komme info om seg selv, ikke alle andre brukere. Denne
        funksjonen skal være låst til Admin/leder. Deretter må vi kjøre en tilkobling fra skjemaet under som oppdaterer
        brukerens info dersom det skjer noen endringer. Dette gjøres ved en INSERT INTO funksjon.
    */
?>
<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">

<body>
<style> 
        body { 
            text-align: left; 
        } 
        form { 
            color: green; 
        } 
    </style> 
    <form action="7-3m.php" method="post" >
    <input type="text" id=fname name="Fornavn" placeholder="Fornavn" value="<?php if( !empty( $_POST['Fornavn'] ) ) { echo $_POST['Fornavn']; } ?>" required><br>
    <input type="text" id=lname name="Etternavn" placeholder="Etternavn" value="<?php if( !empty( $_POST['Etternavn'] ) ) { echo $_POST['Etternavn']; } ?>" required><br>
    <input type="text" id=epost name="Epost" placeholder="Epost" value="<?php if( !empty( $_POST['Epost'] ) ) { echo $_POST['Epost']; } ?>" required><br>
    <input type="text" id=number name="Telefonnummer" placeholder="Telefonnummer" value="<?php if( !empty( $_POST['Telefonnummer'] ) ) { echo $_POST['Telefonnummer']; } ?>" required><br>
    <input type="text" id=adress name="Gateadresse" placeholder="Adresse" value="<?php if( !empty( $_POST['Gateadresse'] ) ) { echo $_POST['Gateadresse']; } ?>" required><br>
    <input type="text" id=postalmumber name="Postnr" placeholder="Postnr" value="<?php if( !empty( $_POST['Postnr'] ) ) { echo $_POST['Postnr']; } ?>" required><br>
    <input type="text" id=postalplace name="Poststed" placeholder="Poststed" value="<?php if( !empty( $_POST['Poststed'] ) ) { echo $_POST['Poststed']; } ?>" required><br>
    <br>
    Betalt? 1 = ja, 0 = nei
    <br>
    <input type="text" id=paid name="Betalt" placeholder="Betalt" value="<?php if( !empty( $_POST['Betalt'] ) ) { echo $_POST['Betalt']; } ?>" required> <br>
    <br><br>
    <button type="submit" id="submit" value="submit" name="submit">    <style> 

           
        } 
    </style> Lagre informasjon </button>
</form>

<?php
/*      if (endring fra nedlastet inhold) 
        {
            do(INSERT INTO) eller kanskje "sql = "UPDATE Medlemmer SET epost = ? WHERE ID = ?";"
        } else 
            {
                do (ingenting)
            }
*/
?>