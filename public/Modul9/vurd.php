<?php session_start();
require "inc/dbConn.inc.php";
$tilkobling = connectToDB();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Neo</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="login">
      <h1>Login Neo Ungdomsklubb</h1>
      <form action="" method="post">
        <label for="brukernavn">
          <i class="fas fa-user"></i>
        </label>
        <input type="text" name="brukernavn" placeholder="Brukernavn" id="brukernavn "required>
        <label for="passord">
        <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="passord" placeholder="Passord" id="passord" required>
        <input type="submit" value="Login" name="submit">
      </form>
    </div>
  </body>
</html>
<?php
if (isset($_POST['submit'])) {
  # sjekk for at brukernavn og passord blir hentet ut
  if ( !isset($_POST['brukernavn'], $_POST['passord']) ) {

    #hvis data ikke blir hentet ut: exit
    exit('Fyll ut både brukernavn og passord!');
  }
  # lager SQL-spørringens struktur
  $sql = 'SELECT id, passord FROM medlemmer WHERE brukernavn = ?';

  # Prepare SQL statement for å prevente SQL injection.
  if ($stmt = $tilkobling->prepare($sql)) {

    # binder parametere (s = string, i = int, b = blob, etc)
  	$stmt->bind_param('s', $_POST['brukernavn']);
  	$stmt->execute();

    #lagre resultatet så vi kan se om brukeren eksisterer i databasen.
  	$stmt->store_result();

    if ($stmt->num_rows > 0) {
    	$stmt->bind_result($id, $passord);
    	$stmt->fetch();

      #sjekker at brukeren finnes, så verifiser passordet
    	if ($_POST['passord'] === $passord) {

    		# oppretter session
    		$_SESSION['loggedin'] = TRUE;
    		$_SESSION['name'] = $_POST['brukernavn'];
    		$_SESSION['id'] = $id;
        echo "<script> location.href='http://127.0.0.1:8081/php-prosjekt/home.php'</script>";
    	}
      else {
    		  echo 'Ukorrekt passord!';
    	}
    }
    else {
    	echo 'Ukorrekt brukernavn!';
    }
  $stmt->close();
  }
}
?>
