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
$sql = "SELECT * FROM Medlemmer WHERE Interesse1 = ? ORDER BY ? DESC LIMIT ?";

// Steg 1: forbereder spørringen
$stmt = $tilkobling->prepare( $sql );
var_dump($stmt);

// Steg 2: kobler parametrene våre med SQL-spørringens struktur
$stmt->bind_param( "ssi", $interesse1, $sortering, $begrensning );

// Steg 3: setter parametre, utfører spørringen og henter resultatet
$interesse1 = $_POST['handball'];
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
        <th>Interesse 1</th>
        <th>Interesse 2</th>
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
        <td><?php echo $row['Interesse1']; ?></td>
        <td><?php echo $row['Interesse2']; ?></td>
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

<!-- Prøver å kjøre en ny henting av data for å gruppere med andre interesser-->
<br>
<br>

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
$sql = "SELECT * FROM Medlemmer WHERE Interesse2 = ? ORDER BY ? DESC LIMIT ?";

// Steg 1: forbereder spørringen
$stmt = $tilkobling->prepare( $sql );

// Steg 2: kobler parametrene våre med SQL-spørringens struktur
$stmt->bind_param( "ssi", $interesse2, $sortering, $begrensning );

// Steg 3: setter parametre, utfører spørringen og henter resultatet

?>
<form action="modul7-5.php" method="post">

<select name='interest'>
    <option value="">Select...</option>
    <option value="<?$_POST['golf']?>">Golf</option>
    <option value="<?$_POST['handball']?>">Håndball</option>

</select>

</form>


<?php


$interesse2 = $_POST['golf'];
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
        <th>Interesse 1</th>
        <th>Interesse 2</th>
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
        <td><?php echo $row['Interesse1']; ?></td>
        <td><?php echo $row['Interesse2']; ?></td>
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