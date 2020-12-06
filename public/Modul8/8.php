<!DOCTYPE html>
<html>
<body>
<h1>Innloggingsside</h1>

<?php
/*Lag autentisering for medlemssystemet. Det innebærer:
• å lage en innloggingsside hvor brukernavn og passord sjekkes (passordet må ikke krypteres i
denne modulen)
• ulike handlinger basert på innloggingssjekk:
o setting av SESSION-variabler og videresending til innlogget område, eller...
o visning av innloggingsside med feilmelding
• å lage minst én beskyttet side med innloggingssjekk og ulike handlinger basert på denne
sjekken:
o visning av den beskyttede siden, eller...
o videresending; fortrinnsvis med feilmelding
Ev. include-filer, klasser/funksjoner kan vurderes. Klasser tilhører objektorientert programmering og forventes ikke.
 */
?>

<?php

// hva som trengs til oppgaven:

        //innlogging med brukernavn og passord, uten kryptering:

        /*handlinger basert på innloggingssjekk
            setter SESSION-variabler og videresender til innlogget område 
            eller
            viser feilmelding som følge av feil brukernavn og/eller passord*/

        /*age minst 1 beskyttet side med innloggingssjekk og ulike handlinger basert på sjekken som:
            visning av beskyttet side 
            eller
            videresending med feilmelding */
?>
<form method= "post" action=<?php echo $_SERVER['PHP_SELF'];?>>
        <label for="Brukernavn"><b>Brukernavn</b></label><br>
        <input type="text" id="Brukernavn" name="Brukernavn" value="<?php if(isset($_POST['Brukernavn'])){echo $_POST['Brukernavn'];
        }?>"><br>

        <label for="Passord"><b>Passord</b></label><br>
        <input type="password" id="Passord" name="Passord" value="<?php if(isset($_POST['Passord'])){echo $_POST['Passord'];
        }?>"><br>


