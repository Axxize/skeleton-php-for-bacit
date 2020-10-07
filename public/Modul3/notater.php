<?php

//Notater fra forelesning 08.09

//egne design lastes ned fra prosjekt-siden på canvas

/*$alder = 24;
if ( $alder > 20)

{
    echo 'alderen er over 20';
}

$loggedin = true;
if ( !$loggedin )
{
    header("location; http://www.vg,no/");
}
else 
{
    echo 'Hei';
}


$alder = 24;
if ($alder < 10)
{
    header("location: us/lock_screen.html");
}
elseif( $alder < 20)
{
    echo 'du er ung';
}
else
{
    echo 'Hei';
} */
?> 

<?php

//form i html

//method="post"
//$_post['fname'] for å finne ut hva brukeren fylte ut




?>

<?php 
/* Array, må alltid ha en nøkkel(index) og en value. Non-assicoated array og associated array
nøklene vil være: 0,1,2,3 osv. Begynner alltid med 0. 
$medlemmer = array(); ved ingenting mellom parantesene vil den ikke inneholde noenting, da kan man legge til ting etterpå
$medlemmer = array('Silje', 'Johan', 'Kristian', 'Ola');
array(7=>'Silje');
array('navn'=>'Silje');

for å skrive ut:
    echo $medlemmer[0];
eller echo $medlemmer['navn'];
*/ ?>

<?php
/*
    $medlemmer=array('Silje','Johan');
    echo "Kom hit a jævla $medlemmer[1]";*/
?>

<?php 
    /*kan også bruke print_r($medlemmer); dette funker veldig bra til debuging osv.
    eller var_dump($medlemmer);

    foreach($medlemmer as $key => $value)
    {

    }



*/
    ?>
<?php
    print_r( $_POST);
?>
<!DOCTYPE html>
<html>
<body>


<h2>HTML Forms</h2>

<form method="post" action="notater.php">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="<?php echo $_POST['fname'];?>"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="<?php echo $_POST['fname'];?>"><br> 
  <label for="adresse">Adresse:</label><br>
  <input type="text" id="adresse" name="adresse" value="<?php echo $_POST['adresse'];?>"><br>
  <label for="postnr">Postnr:</label><br>
  <input type="text" id="postnr" name="postnr" value="<?php echo $_POST['postnr'];?>"><br>
  <label for="poststed">Poststed:</label><br>
  <input type="text" id="poststed" name="poststed" value="<?php echo $_POST['poststed'];?>"><br>
  <input type="date" id="fødselsdato" name="fødselsdato" value="<?php echo $_POST['fødselsdato'];?>"><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
<?php
if ( $_POST['submit'] == 'submit')
{
    echo 'Ditt navn er: ' . $_POST['fname'] . ' ' . $_POST['lname'];
}
if (empty( $_POST['fname'] ) )
{
    echo 'Du har ikke oppgitt fornavn <br />';
}
if (empty( $_POST['lname'] ) )
{
    echo 'Du har ikke oppgitt etternavn <br />';
}
if (empty( $_POST['adresse'] ) )
{
    echo 'Du har ikke oppgitt adresse <br />';
}
if (empty( $_POST['postnr'] ) )
{
    echo 'Du har ikke oppgitt postnr <br />';
}
if (empty( $_POST['poststed'] ) )
{
    echo 'Du har ikke oppgitt poststed <br />';
}
if (empty( $_POST['fødselsdato'] ) )
{
    echo 'Du har ikke oppgitt fødselsdato <br />';
}
?>
<?php
//i form over ser vi at vi har type="text" der kan man ha email, password eller number hvor man får opp flere opsjoner
//form action="" vil fortelle hvor du sender brukeren etter den skriver inn ting og trykker "submit"
//