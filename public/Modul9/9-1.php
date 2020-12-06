<?php
/*denne filen vil fungere som en "secret" fil som ble introdusert i modul 8. Det vi har gjort her er egentlig et forsøk på en profilside
  hvor en bruker som har riktig innlogging kan få se sin brukerinfo lagret i databasen, samt et bilde som opplastes til sin side. 
  9-1.php, login.php og upload.php er de 3 filene som henger sammen i besvarelsen til modul 9-1. Legger også ved en fil ved navn
  lastopp.php som også besvarer oppgaven, men som lagrer bildet i en lokal katalog. 
*/
session_start(); //Start session. Dette gjøres i hver fil. 

    define('MYSQL_VERT', 'db');
    define('MYSQL_BRUKER', 'dbuser');
    define('MYSQL_PASSORD', 'BACIT2020');
    define('MYSQL_DB', 'ergotests');

// Kobler til database med oppkoblingsdata, 
$tilkobling = new mysqli( MYSQL_VERT, MYSQL_BRUKER, MYSQL_PASSORD, MYSQL_DB );
if ( $tilkobling->connect_error )
{
    die('Tilkoblingen til databasen feilet. Vennligst forsøk igjen senere.');
    exit();
}
    if($_SESSION['User']) 
    {
        $sql = "SELECT * FROM Members WHERE ID < 2";



//Steg 1, forbereder spørringen
$stmt = $tilkobling->prepare($sql);

//stmt execute henter resultat fra databasen og for å få dette opp kjører vi $resultat*/

$etternavn= 'etternavn';
$fornavn = "fornavn";
$telefonnummer = 'telefonnummer';
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
    <!-- Lager en tabell som viser medlemmet i databasen -->
    <table align="center">
    <tr>
        <th>fornavn</th>
        <th>etternavn</th>
        <th>telefonnummer</th>
    </tr>
    <?php 
    /* Henter en rad om gangen fra databasen, altså et medlem om gangen
       Det legges til ett <tr>, aka table row element for hvert nytt medlem 
       Hver enkelt rad blir lagret i $row, vi henter det med fetch_assoc. 
       While løkka kjører så lenge det er treff i databasen.
       Det kan bli at langt array, men vi velger på radene hvilken info vi vil ha ut.*/
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
        <td><?php echo $row['fornavn']; ?></td>
        <td><?php echo $row['etternavn']; ?></td>
        <td><?php echo $row['telefonnummer']; ?></td>
        
    </tr>
    <?php
    }
    // ---- herifra og ned prøver vi å få hentet ut et bilde fra databasen
    //Steg 1, forbereder spørringen
    $stmt = $tilkobling->prepare($sql);
   
    $sql = "SELECT * FROM Bilde WHERE ID = 1";
    
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
        
           while( $row = $resultat->fetch_assoc() ) {
            $fileName= ($sql="SELECT * FROM Bilde WHERE ID = 1");
            
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
            <td><img src="<?php echo $fileName; ?>" widht="100" height="200"></td>
            <?php /* forsøkte her å hente ned bildefilen fra phpmyadmin. 
    define('MYSQL_VERT', 'db');
    define('MYSQL_BRUKER', 'dbuser');
    define('MYSQL_PASSORD', 'BACIT2020');
    define('MYSQL_DB', 'ergotests');

    $tilkobling = new mysqli( MYSQL_VERT, MYSQL_BRUKER, MYSQL_PASSORD, MYSQL_DB );
    if ( $tilkobling->connect_error )
    {
    die('Tilkoblingen til databasen feilet. Vennligst forsøk igjen senere.');
    exit();
        }
        $sql = "SELECT * FROM Bilde";
        $resultat = mysqli_query($db, $sql);
        while ($row = mysqli_fetch_array($resultat)) {
            echo "<div id='img_div'>";
            echo "<img src='Bilde/".$row['Bilde']."'>";
            echo "<p>".$row['Filtype']."</p>";
            echo "</div>";
        } */
?>
        
        </tr>
        <?php
        }
        // Lukker spørring 
        $stmt->close();
        ?>
        </table>
        <?php 
        /* Avslutter databasetilkobling */
        $tilkobling->close();
 
    }
        else
        {
            header("location: login.php"); //Hvis systemet ikke oppdager en innlogget bruker, vil man sendes tilbake igjen til innloggingssiden
        }

?>

<html>