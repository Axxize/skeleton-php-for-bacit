<?php
session_start(); //starter session

// Definerer konstanter for å koble til databasen 
define('MYSQL_VERT', 'db');
define('MYSQL_BRUKER', 'dbuser');
define('MYSQL_PASSORD', 'BACIT2020');
define('MYSQL_DB', 'ergotests');

// Kobler til database med oppkoblingsdata på samme måte som alle tidligere oppgaver
//Denne kunne strengt tatt vært laget som en include-fil for en mer lettvint koding

$tilkobling = new mysqli( MYSQL_VERT, MYSQL_BRUKER, MYSQL_PASSORD, MYSQL_DB );
if ( $tilkobling->connect_error )
{
    die('Tilkoblingen til databasen feilet. Vennligst forsøk igjen senere.');
    exit();
}

if (isset($_POST["submit"] ) ) {

    $brukernavn = $_POST["brukernavn"];
    $passord = $_POST["passord"];

    if (empty($brukernavn) ) {
        echo "Du må fylle inn brukernavn! <br>"; // i ettertid ser jeg at disse feilmeldingene overkjøres av "required i html
    }

    if (empty($passord) ) {
        echo "Du må fylle inn passord! <br>";
    }

    if (isset($brukernavn) && isset($passord) ) { //dersom man har skrevet inn riktig så vil sql-koden kjøres
        
        $sql = "SELECT brukernavn FROM users WHERE brukernavn = '".$brukernavn."' AND passord = '".$passord."'";

        $resultat = $tilkobling->query($sql);

        if ($resultat -> num_rows > 0){
        $stmt = $tilkobling->prepare($sql);
        $stmt->execute();
        $result = $stmt -> get_result();

        while ($rad = $resultat -> fetch_assoc() ) {
            $_SESSION["brukernavn"] = $rad["brukernavn"]; //kjører en session slik at man "lagrer" en innlogging slik at brukeren 
                                                          //kan være innlogget videre, uten å logge inn flere ganger
            header("location: velkommen.php"); //sender videre til beskyttet side

            die; //avslutter while loopen

        }
    }
    else {
        echo "brukernavn og/eller passord er feil!"; //hvis brukernavn og/eller passord ikke stemmer vil ikke sql kjøres, men heller denne mld
    }
}
}
?>
<!DOCTYPE html> <!--Standard form-->
    <head>
        <meta charset="UTF-8">
        <title>Logg inn</title>
        <h1>Logg inn side</h1>
    </head>

    <body>
        <form method="post">
            <input type="text" name="brukernavn" value="<?php if( !empty( $_POST['brukernavn'] ) ) { echo $_POST['fornavn']; } ?>"required><br>
            <input type="password" name="passord" required>
            <input type="submit" name="submit" class="btn btn-primary" value="Logg inn">
        </form>
    </body>
</html>
    
    

