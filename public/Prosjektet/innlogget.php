<?php

    session_start(); //Start session. Dette gjøres i hver fil. 
if($_SESSION['Brukernavn']) 
{
include "oppkobling.php";
$Brukernavn = $_SESSION['Brukernavn'];
$sql = "SELECT * FROM medlem WHERE Brukernavn = $Brukernavn";

$stmt = $tilkobling->prepare($sql);

$ID = 'ID';
$fornavn = 'Fornavn';
$etternavn = 'Etternavn';
$adresse = 'Adresse';
$postnummer = 'Postnummer';
$poststed = 'Poststed';
$mobilnummer = 'Mobilnummer';
$epost = 'Epost';
$fodselsdato = 'Fodselsdato';
$kjonn = 'Kjonn';
$brukernavn = 'Brukernavn';
$passord = 'Passord';

if ($stmt->execute()){
    //det fungerte
} else{
    echo "Dette gikk ikke som det skulle";//Det fungerte ikke
}
$resultat = $stmt->get_result();


?>

<html>
    <head>
        <title>Medlemsinformasjon</title>
        <style> 
        body { 
            text-align: left; 
        } 
        h1 { 
            color: blue; 
        } 
    </style> 
        <h1>Medlemsdata</h1>
        <h2>    _________     </h2>
        <br>
        <br>
    </head>

    <body>
    <!-- Lager en tabell som viser medlemmene i databasen -->
    <table>
    <tr>
        <th>ID</th>
        <th>Fornavn</th>
        <th>Etternavn</th>
        <th>Adresse</th>
        <th>Postnummer</th>
        <th>Poststed</th>
        <th>Mobilnummer</th>
        <th>Epost</th>
        <th>Fødselsdato</th>
        <th>Kjønn</th>
        <th>Brukernavn</th>
        
    </tr>
    <?php 

    while($row = $resultat->fetch_assoc()) {
        ?>
        <td><?php echo $row['ID']; ?></td>
        <td><?php echo $row['Fornavn']; ?></td>
        <td><?php echo $row['Etternavn']; ?></td>
        <td><?php echo $row['Adresse']; ?></td> 
        <td><?php echo $row['Postnummer']; ?></td>
        <td><?php echo $row['Poststed']; ?></td>
        <td><?php echo $row['Mobilnummer']; ?></td>
        <td><?php echo $row['Epost']; ?></td>
        <td><?php echo $row['Fodselsdato']; ?></td>
        <td><?php echo $row['Kjonn']; ?></td>
        <td><?php echo $row['Brukernavn']; ?></td>
    </tr>
    <?php
    }
    $stmt -> close();
    ?>
    </table>
    <?php
    $tilkobling->close();


    
echo "<h1>Gratulerer!!! </h1>";
echo "Velkommen til denne siden, som krever at du er innlogget. ";
//echo " <br/> <br/> <a href='loggut.php'>Logg ut</a>";
//Logg ut knapp. 
}
    

else
{
    include "logginn.php";
}

if($_SESSION["brukernavn"]) { //dersom man er logget inn med riktig brukernavn får man kommet inn
    echo "<h1>Velkommen til velkommensiden!</h1>";
    echo "<br />";
    echo $_SESSION["brukernavn"];
    echo "<br />";
    echo "Du er nå logget inn";
    echo " <br> <br> <a href='loggut.php'>Logg ut</a>";   //logg ut knapp slik at man kan avslutte session
} else {                                                  //dette vil gjøre at man kastes ut, da "velkommen.php" er beskyttet
    include "logginn.php"; /*dersom man ikke er logget inn vil man kastes tilbake til logg inn siden, slik at man ikke har tilgang til
                            denne siden uten å være logget inn. Altså aldri komme inn*/
}
?>