<?php
//velkommenside som man får tilgang til dersom brukeren er innlogget, hvis ikke vil man redirectes til innloggingssiden

session_start(); //starter session
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