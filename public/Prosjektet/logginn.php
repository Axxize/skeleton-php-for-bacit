<?php
session_start(); //Starter session. Forteller til nettleser at session skal startes. Vanlig programmeringskikk.

include 'oppkobling.php'; //include

if(isset($_POST['submit']))
{

$Brukernavn = $_POST['Brukernavn'];
$Passord = $_POST['Passord'];

    if(empty($_POST['Passord'])){
        echo 'Fyll inn ditt passord.<br/>';
    }
    if(empty($_POST['Brukernavn'])){
        echo 'Fyll inn ditt brukernavn.<br/>';
    }
   
if(isset($Brukernavn) && isset($Passord)) 
        {
            
            $sql = "SELECT * FROM medlem WHERE Brukernavn = '".$Brukernavn."' AND Passord = '".$Passord."' "; 
            
            $resultat = $tilkobling->query($sql);

                if($resultat ->num_rows > 0) //Dersom vi finner en matchende rad.
                {
                    $stmt = $tilkobling -> prepare($sql);
                    if ($stmt->execute()){
                        //det fungerte
                    } else{
                        echo "Dette gikk ikke som det skulle";//Det fungerte ikke
                    }
                    $result = $stmt ->get_result();

                        while ($rad = $resultat -> fetch_assoc())
                        {
                            $_SESSION["Brukernavn"] = $rad["Brukernavn"];

                            header("Location: innlogget.php"); //Siden behandles og sende bruker inn til en hemmelig side. 

                        die;
                        }
                } $stmt->close();
        }

    
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
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <br><br>
        <input type="text" name="Brukernavn" placeholder="Ditt brukernavn" value="<?php if( !empty( $_POST['Brukernavn'] ) ) { echo $_POST['Brukernavn']; } ?>" required><br><br>
    
     
        <input type="password" name="Passord" placeholder="Ditt passord" value="<?php if( !empty( $_POST['Passord'] ) ) { echo $_POST['Passord']; } ?>" required><br><br><br>
    
    <input type="submit" name="submit" value="Logg inn">
</form>
<?php echo " Registrere deg som medlem? Trykk her <br/> <br/> <a href='registrer.php'>Registrer</a>"; ?>
</body>
</html>