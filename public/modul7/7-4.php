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
date_default_timezone_set('UTC');
// Lager SQL-spørringens struktur
$sql = "SELECT * FROM Aktiviteter WHERE Startdato >= CURRENT_DATE";

// Steg 1: forbereder spørringen
$stmt = $tilkobling->prepare( $sql );

// Steg 2: kobler parametrene våre med SQL-spørringens struktur
$stmt->bind_param( "issii", $ID, $Aktivitet, $Ansvarlig, $Startdato, $Sluttdato );

// Steg 3: setter parametre, utfører spørringen og henter resultatet
$ID = "ID";
$Aktivitet = "Aktivitet";
$Ansvarlig = "Ansvarlig";
$Startdato = "Startdato";
$Sluttdato = "Sluttdato";
$stmt->execute();
$resultat = $stmt->get_result();
?>
<html>
    <head>
        <title>Aktivitet</title>
    </head>

    <body>
    <!-- Lager en tabell som viser aktivitetene i databasen -->
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
        <th>Aktivitet</th>
        <th>Ansvarlig</th>
        <th>Startdato</th>
        <th>Sluttdato</th>
        
    </tr>
    <?php 
    /* Henter en rad om gangen fra databasen (dvs. ett og ett medlem)
       Det legges til ett <tr>-element for hvert nytt medlem
     */
    while( $row = $resultat->fetch_assoc() ) {
    ?>
    <tr>
        <td><?php echo $row['ID']; ?></td>
        <td><?php echo $row['Aktivitet']; ?></td>
        <td><?php echo $row['Ansvarlig']; ?></td>
        <td><?php echo $row['Startdato']; ?></td>
        <td><?php echo $row['Sluttdato']; ?></td>
     
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