<?
    session_start(); //starter session
    
    unset($_SESSION['Brukernavn']); //her avsluttes session 

    header("location: logginn.php"); //og man sendes tilbake til innloggingssiden
?>