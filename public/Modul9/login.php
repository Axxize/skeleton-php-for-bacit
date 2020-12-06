<?php
/*
    Denne filen fungerer som innloggingssiden som vil samarbeide med filen kalt 9-1.php. Som igjen er et forsøk på å få til en 
    innloggingsside.
*/
session_start(); //Starter session. Forteller til nettleser at session skal startes. Vanlig programmeringskikk.

//include 'data.php'; //include
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
if(isset($_POST['submit']))
{

$User = $_POST['User'];
$Pass = $_POST['Pass'];

    if(empty($_POST['Pass'])){
        echo 'Fyll inn ditt passord.<br/>';
    }
    if(empty($_POST['User'])){
        echo 'Fyll inn ditt brukernavn.<br/>';
    }
 
if(isset($User) && isset($Pass)) 
        {
            
            $sql = "SELECT * FROM loginform WHERE User = '".$User."' AND Pass = '".$Pass."' "; 
            
            $resultat = $tilkobling->query($sql);

                if($resultat ->num_rows > 0) //Dersom vi finner en matchende rad.
                {
                    $stmt = $tilkobling -> prepare($sql);
                    $stmt -> execute();
                    $result = $stmt ->get_result();

                        while ($rad = $resultat -> fetch_assoc())
                        {
                            $_SESSION["User"] = $rad["User"];

                            header("Location: 9-1.php"); //Her sendes brukeren videre til "hemmelig" side

                        die;
                        }
                } 
                else {
                    echo "Du har tastet feil brukernavn og/eller passord.";
                }
        }$stmt->close();

    
}


#Lukk spørring og avslutter databasetilkobling
$tilkobling->close();


?>

<html>
    <head>
    <title>Logg inn</title>
    </head>
    
    <h1>
    
    <style> 
        body { 
            text-align: center; 
        } 
        h1 { 
            color: blue; 
        } 
    </style> 
    
    Logg inn
    
    </h1>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
<form method="POST" action="login.php">
    <br><br>
        <input type="text" name="User" placeholder=" Enter your username" value="<?php if( !empty( $_POST['User'] ) ) { echo $_POST['User']; } ?>" required><br><br>
    
     
        <input type="password" name="Pass" placeholder=" Enter your Password" value="<?php if( !empty( $_POST['Pass'] ) ) { echo $_POST['Pass']; } ?>" required><br><br><br>
    
    <input type="submit" name="submit" value="Logg inn">
</form>

</body>
</html>