<?php

    session_start(); //Starter session 

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
$sql = "SELECT * FROM Members WHERE ID < 2";

// Steg 1: forbereder spørringen
$stmt = $tilkobling->prepare( $sql );
    if($_SESSION['brukernavn']) 
    {
        $sql = "SELECT * FROM Members WHERE ID < 2";


/*Vi kan velge hva vi skal hente, vi henter det fra tabellen medlemmer. 
Om du vil ha definert possted, velg where = 'possted'
I den over henter vi de som har en form for betaltstatus. 
På order by, så kan vi sortere. f.eks ved etternavn, og vi legger på en descent, derav hly til lavt. */

//Steg 1, forbereder spørringen
$stmt = $tilkobling->prepare($sql);
/*Tilkobler oss til databasen ved å bruke malen ovenfor */

/*Steg 2, kobler paramtere våre med SQL-spørringens struktur
Kobler dataene vi har sammen med spørsmålene ovenfor. Så vi vet hva som skal være i. 
Da bruker vi objektet statement, bind_param, den binder det som betalt og det nedenfor kommer i rekkefølge
av det ovenfor. "isi" er en datatype vi må ha med, integer, string, integer. */

//$stmt -> bind_param ('sss', $Etternavn, $Fornavn, $Telefonnummer);

/*Steg 3, setter parametre, utfører spørringen og henter resultatet
Definere parametre, hva de skal inneholde. Her skjer spørringen også. 
Dersom databsen feiler så får vi output direkte på hva som er feil. 
I dette ønsker vi å se alle som ikke har betalt. Vi ønsker å sortere på etternavn, og vi ønsker
kun ett svar fra programmet. Derav en begrensing på 1.
stmt execute henter resultat fra databasen og får å få dette opp kjører vi $resultat*/

$Etternavn= 'Etternavn';
$Fornavn = "Fornavn";
$Telefonnummer = 'Telefonnummer';
$stmt -> execute();
$resultat = $stmt->get_result();
?>

<html>
    <head>
        <title>Medlem</title>
        <style> 
        body { 
            text-align: center; 
        } 
        h1 { 
            color: green; 
        } 
        
    </style> 
        <h1>Medlem</h1>
        <h2>    _________     </h2>
        <br>
        <br>
    </head>

    <body>
    <!-- Lager en tabell som viser medlemmene i databasen -->
    <table align="center">
    <tr>
        <th>Fornavn</th>
        <th>Etternavn</th>
        <th>Telefonnummer</th>
    </tr>
    <?php 
    /* Henter en rad om gangen fra databasen (dvs. ett og ett medlem)
       Det legges til ett <tr>-element for hvert nytt medlem 
       Hver enkelt rad blir lagret i $row, vi henter det med fetch_assoc. Det henter ut data. 
       While løkka kjører så lenge det er treff i databasen. 
       Det blir da ett langt array, og vi velger på radene hvilken info vi vil ha ut.*/
    while( $row = $resultat->fetch_assoc() ) {
    ?>
    <style>
    
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
  
}

td, th {
  border: 1px solid #dddddd;
  text-align:  center;
  padding: 10px;
}

tr:nth-child(even) {
  background-color: #dddd;
}
</style>
    <tr>
        <td><?php echo $row['Fornavn']; ?></td>
        <td><?php echo $row['Etternavn']; ?></td>
        <td><?php echo $row['Telefonnummer']; ?></td>
        
    </tr>
    <?php
    }
    
    
    // ----

    $sql = "SELECT * FROM Bilde WHERE ID < 2";


    /*Vi kan velge hva vi skal hente, vi henter det fra tabellen medlemmer. 
    Om du vil ha definert possted, velg where = 'possted'
    I den over henter vi de som har en form for betaltstatus. 
    På order by, så kan vi sortere. f.eks ved etternavn, og vi legger på en descent, derav hly til lavt. */
    
    //Steg 1, forbereder spørringen
    $stmt = $tilkobling->prepare($sql);
    /*Tilkobler oss til databasen ved å bruke malen ovenfor */
    
    /*Steg 2, kobler paramtere våre med SQL-spørringens struktur
    Kobler dataene vi har sammen med spørsmålene ovenfor. Så vi vet hva som skal være i. 
    Da bruker vi objektet statement, bind_param, den binder det som betalt og det nedenfor kommer i rekkefølge
    av det ovenfor. "isi" er en datatype vi må ha med, integer, string, integer. */
    
    //$stmt -> bind_param ('sss', $Etternavn, $Fornavn, $Telefonnummer);
    
    /*Steg 3, setter parametre, utfører spørringen og henter resultatet
    Definere parametre, hva de skal inneholde. Her skjer spørringen også. 
    Dersom databsen feiler så får vi output direkte på hva som er feil. 
    I dette ønsker vi å se alle som ikke har betalt. Vi ønsker å sortere på etternavn, og vi ønsker
    kun ett svar fra programmet. Derav en begrensing på 1.
    stmt execute henter resultat fra databasen og får å få dette opp kjører vi $resultat*/
    
    $Bilde= 'Bilde';

    $stmt -> execute();
    $resultat = $stmt->get_result();
    ?>
    
    <html>

    
        <body>
        <!-- Lager en tabell som viser medlemmene i databasen -->
        <table align="center">
        <tr>
            <th>Profilbilde</th>
            
        </tr>
        <?php 
        /* Henter en rad om gangen fra databasen (dvs. ett og ett medlem)
           Det legges til ett <tr>-element for hvert nytt medlem 
           Hver enkelt rad blir lagret i $row, vi henter det med fetch_assoc. Det henter ut data. 
           While løkka kjører så lenge det er treff i databasen. 
           Det blir da ett langt array, og vi velger på radene hvilken info vi vil ha ut.*/
        while( $row = $resultat->fetch_assoc() ) {
        ?>
        <style>
        
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 50%;
      
    }
    
    td, th {
      border: 1px solid #dddddd;
      text-align:  center;
      padding: 10px;
    }
    
    tr:nth-child(even) {
      background-color: #dddd;
    }
    </style>
        <tr>
            <td><?php echo $row['Bilde']; ?></td>
            
        </tr>
        <?php
        }
        // Lukk spørring 
        $stmt->close();
        ?>
        </table>
        <?php 
        /* Avslutt databasetilkobling */
        $tilkobling->close();
 
    }
        else
        {
            include "lastopp.php"; //Dersom bruker ikke er innlogget så vil programmet kjøres til logg inn siden. 
        }

?>

<html>