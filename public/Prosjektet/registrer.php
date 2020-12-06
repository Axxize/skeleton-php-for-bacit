<?php
include 'oppkobling.php';
?>
<html>
<h1>   <style> 
        body { 
            text-align: center; 
        } 
        h1 { 
            color: black; 
        } 
    </style> Registrer deg som medlem! </h1>
<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">


<body>
    <link rel="stylesheet" href="style2.css">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
    <input type="text" id=Fornavn name='Fornavn' placeholder="Fornavn" value="<?php if( !empty( $_POST['Fornavn'] ) ) { echo $_POST['Fornavn']; } ?>" required>
    <input type="text" id=Etternavn name='Etternavn' placeholder="Etternavn" value="<?php if( !empty( $_POST['Etternavn'] ) ) { echo $_POST['Etternavn']; } ?>" required>
    <input type="text" id=Adresse name='Adresse' placeholder="Adresse" value="<?php if( !empty( $_POST['Adresse'] ) ) { echo $_POST['Adresse']; } ?>" required>
    <input type="int"  id=Postnummer name='Postnummer' placeholder="Postnummer" value="<?php if( !empty( $_POST['Postnummer'] ) ) { echo $_POST['Postnummer']; } ?>" required><br>
    <input type="text" id=Poststed name='Poststed' placeholder="Poststed" value="<?php if( !empty( $_POST['Poststed'] ) ) { echo $_POST['Poststed']; } ?>" required>
    <input type="int"  id=Mobilnummer name='Mobilnummer' placeholder="Mobilnummer" value="<?php if( !empty( $_POST['Mobilnummer'] ) ) { echo $_POST['Mobilnummer']; } ?>" required>
    <input type="text" id=Epost name='Epost' placeholder="Epost" value="<?php if( !empty( $_POST['Epost'] ) ) { echo $_POST['Epost']; } ?>" required>
    <input type="int"  id=Fodselsdato name='Fodselsdato' placeholder="Fodselsdato" value="<?php if( !empty( $_POST['Fodselsdato'] ) ) { echo $_POST['Fodselsdato']; } ?>" required><br>
    <input type="text" id=Kjonn name='Kjonn' placeholder="Kjonn" value="<?php if( !empty( $_POST['Kjonn'] ) ) { echo $_POST['Kjonn']; } ?>" required> <?php // Ønsker å legge inn dropp ned meny, kvinne/mann ?>
    <input type="text" id=Brukernavn name='Brukernavn' placeholder="Brukernavn" value="<?php if( !empty( $_POST['Brukernavn'] ) ) { echo $_POST['Brukernavn']; } ?>" required>
    <input type="text" id=Passord name='Passord' placeholder="Passord" value="<?php if( !empty( $_POST['Passord'] ) ) { echo $_POST['Passord']; } ?>" required>
    

    <br><br>
    <button type="submit" id="submit" value="submit" name="submit">    <style> 
        body { 
            text-align: center; 
        } 
        button { 
            color: blue; 
           
        } 
    </style> Registrer meg som medlem </button>

    <?php echo "<br/><br/>Allerde medlem? Trykk her <br/> <br/> <a href='logginn.php'>Logg inn</a>"; ?>
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
        if ( empty( $_POST['Adresse'] ) )
        {
            $feilmeldinger[] = "Adresse mangler";
        }
        if ( empty( $_POST['Postnummer'] ) )
        {
            $feilmeldinger[] = "Postnummer mangler";
        }
        if ( empty( $_POST['Poststed'] ) )
        {
            $feilmeldinger[] = "Poststed mangler";
        }
        if ( empty( $_POST['Mobilnummer'] ) )
        {
            $feilmeldinger[] = "Mobilnummer mangler";
        }
        if ( empty( $_POST['Epost'] ) )
        {
            $feilmeldinger[] = "E-post mangler";
        }
        if ( empty( $_POST['Fodselsdato'] ) )
        {
            $feilmeldinger[] = "Fødselsdato mangler";
        }
        if ( empty( $_POST['Kjonn'] ) )
        {
            $feilmeldinger[] = "Kjønn mangler";
        }
        if ( empty( $_POST['Brukernavn'] ) )
        {
            $feilmeldinger[] = "Brukernavn mangler"; //Sette brukernavn = $epost
        }
        if ( empty( $_POST['Passord'] ) )
        {
            $feilmeldinger[] = "Passord mangler";
        }
                        
        
    #Skriver ut hva som mangler og må fylles inn. 
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

                                    $fornavn =          $_POST['Fornavn'];
                                    $etternavn =        $_POST['Etternavn'];
                                    $adresse =          $_POST['Adresse'];
                                    $postnummer =       $_POST['Postnummer'];
                                    $poststed =         $_POST['Poststed'];
                                    $mobilnummer =      $_POST['Mobilnummer'];
                                    $epost =            $_POST['Epost'];
                                    $fodselsdato =      $_POST['Fodselsdato'];
                                    $kjonn =            $_POST['Kjonn'];
                                    $brukernavn =       $_POST['Brukernavn'];
                                    $passord =          $_POST['Passord'];
                      
                                                                                        

                                    #SQL-spørring struktur
                                    $sql = "INSERT INTO medlem (Fornavn, Etternavn, Adresse, Postnummer, Poststed, Mobilnummer, Epost, Fodselsdato, Kjonn, Brukernavn, Passord) 
                                            Values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                                    //Forbered spørring #1
                                    $stmt = $tilkobling->prepare($sql);

                                    #2 Koble sammen paramtere med spørring
                                    $stmt->bind_param("sssisisisss", $fornavn, $etternavn, $adresse, $postnummer, $poststed, 
                                                                    $mobilnummer, $epost, $fodselsdato, $kjonn, $brukernavn, $passord);

                                    if(($stmt->execute()))
                                        {
                                          Echo "Medlemmet er registrert.";
                                          
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