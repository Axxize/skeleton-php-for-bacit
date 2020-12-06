<?php
#Definer konstanter for å koble til d-base
define('MYSQL_VERT', 'db');
define('MYSQL_BRUKER', 'dbuser');
define('MYSQL_PASSORD', 'BACIT2020');
define('MYSQL_DB', 'ergotests');
#Koble til d-base med oppkoblingsdata
$tilkobling = new mysqli( MYSQL_VERT, MYSQL_BRUKER, MYSQL_PASSORD, MYSQL_DB );
if ( $tilkobling->connect_error )
{
    die('Tilkoblingen til databasen feilet. Vennligst forsøk igjen senere.');
    exit();
}
?>
<html>
<h1>   <style> 
        body { 
            text-align: center; 
        } 
        h1 { 
            color: red; 
        } 
    </style> Registrer deg som medlem! </h1>
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
    <input type="text" id=fname name="Fornavn" placeholder="Fornavn" value="<?php if( !empty( $_POST['Fornavn'] ) ) { echo $_POST['Fornavn']; } ?>" required>
    <input type="text" id=lname name="Etternavn" placeholder="Etternavn" value="<?php if( !empty( $_POST['Etternavn'] ) ) { echo $_POST['Etternavn']; } ?>" required><br>
    <input type="text" id=epost name="Epost" placeholder="Epost" value="<?php if( !empty( $_POST['Epost'] ) ) { echo $_POST['Epost']; } ?>" required>
    <input type="text" id=number name="Telefonnummer" placeholder="Telefonnummer" value="<?php if( !empty( $_POST['Telefonnummer'] ) ) { echo $_POST['Telefonnummer']; } ?>" required><br>
    <input type="text" id=adress name="Gateadresse" placeholder="Adresse" value="<?php if( !empty( $_POST['Gateadresse'] ) ) { echo $_POST['Gateadresse']; } ?>" required>
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



                    if ( isset( $_POST['submit'] ) )
                    {
                        #Opprettet matrise for å få ut feilmeldinger. 
                        $feilmeldinger = array();
                        
                        #Sjekker om det er felt som ikke er utfylt. 
                        if ( empty( $_POST['Fornavn'] ) )
                        {
                            $feilmeldinger[] = "Fornavn mangler";
                        }
                        if ( empty( $_POST['Etternavn'] ) )
                        {
                            $feilmeldinger[] = "Etternavn mangler";
                        }
                        if ( empty( $_POST['Epost'] ) )
                        {
                            $feilmeldinger[] = "E-post mangler";
                        }
                        if ( empty( $_POST['Telefonnummer'] ) )
                        {
                            $feilmeldinger[] = "Telefonnummer mangler";
                        }
                        if ( empty( $_POST['Gateadresse'] ) )
                        {
                            $feilmeldinger[] = "Adresse mangler";
                        }
                        if ( empty( $_POST['Postnr'] ) )
                        {
                            $feilmeldinger[] = "Postnr mangler";
                        }
                        if ( empty( $_POST['Poststed'] ) )
                        {
                            $feilmeldinger[] = "Poststed mangler";
                        }
                        if ( empty( $_POST['Betalt'] ) )
                        {
                            $feilmeldinger[] = "Betalingsinformasjon mangler";
                        }
                    
        
                        #Skriver ut hva som mangler og må fylles inn. Forsøkte med en print_r funksjon her få å få feilmeldingene opp, men det skjer ikke. 
                        if ( !empty( $feilmeldinger ) )
                        {
                            echo "<br> <strong> Du må rette på følgende: </strong> <br>";
                            
                            foreach( $feilmeldinger as $key => $feilmelding )
                            {
                                echo "- " . $feilmelding . "<br />";
                            }
                            
                        }                   
                        #Dersom alle felt er ferdig utfylt så vil systemet kjøre videre, med det som befinner seg innenfor else. 
                        else {
#3 Setter paramtere og utfører spørring. Henter resultat. Her kan jeg bruke int for å defiere at tall skal brukes, men har i denne omgang valgt å ikke gjøre dette. 
                                    $Fornavn =          $_POST['Fornavn'];
                                    $Etternavn =        $_POST['Etternavn'];
                                    $Epost =            $_POST['Epost'];
                                    $Telefonnummer =      $_POST['Telefonnummer'];
                                    $Gateadresse =      $_POST['Gateadresse'];
                                    $Postnr =       $_POST['Postnr'];
                                    $Poststed =         $_POST['Poststed'];
                                    $Betalt =           $_POST['Betalt']; 
                                                        #1 dersom betlalt, 0 om ikke. 
                                    #SQL-spørring struktur
                                    $sql = "INSERT INTO Medlemmer (Fornavn, Etternavn, Epost, Telefonnummer, Gateadresse, 
                                                                Postnr, Poststed, Betalt) Values (?, ?, ?, ?, ?, ?, ?, ?)";
                                    //Forbered spørring #1
                                    $stmt = $tilkobling->prepare($sql);
                                    #2 Koble sammen paramtere med spørring
                                    $stmt->bind_param("sssisisi", $Fornavn, $Etternavn, $Epost, $Telefonnummer, $Gateadresse,
                                                                $Postnr, $Poststed, $Betalt);
                                    if(($stmt->execute()))
                                        {
                                            echo 'Medlemmet er registrert i databasen. Gjerne sjekk det ut.';
                                        }
                                    else
                                        { 
                                    echo 'En ukjent feil har oppstått: ' . $tilkobling->error;
                                        }
                                    $stmt->close();
                            }
                    }
#Lukk spørring og avslutter databasetilkobling
$tilkobling->close();
?>
</body>
</html>
