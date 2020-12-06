<!DOCTYPE html>
<html>
<body>

<form method="post" action=<?php echo $_SERVER['PHP_SELF'];?>><br> <!--metoden er å poste på skjermen. Under finner vi tekstboksene--> 
<label for="navn"><br>Navn*:</label><br>
<input type="text" id="navn" name="navn"><br>

<label for="adresse">Andresse*:</label><br>
<input type="text" id="adresse" name="adresse"><br>

<label for="telefonnummer">Telefonnummer*:</label><br>
<input type="text" id="telefonnummer" name="telefonnummer"><br>

<input type="submit" value="send inn">
</form>
</body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $navn= $_POST["navn"]; 
    $adresse= $_POST["adresse"];
    $telefonnummer= $_POST["telefonnummer"]; //det bestemmes at innholdet som skrives inn i tekstboksene skal printes ut på skjermen
}

if(!empty($navn) && empty($adresse) && empty($telefonnummer)) //en rekke feilmeldinger som sjekker etter hva som er fylt ut og ikke, deretter printes hva som må fylles ut
{
    echo "adresse og telefonnummer må fylles ut";
}
elseif(empty($navn) && !empty($adresse) && empty($telefonnummer))
{
    echo "navn og telefonnummer må fylles ut";
}
elseif(empty($navn) && empty($adresse) && !empty($telefonnummer))
{
    echo "navn og adresse må fylles ut";
}
elseif(!empty($navn) && !empty($adresse) && empty($telefonnummer)) 
{
    echo "telefonnummer må fylles ut";
}
elseif(!empty($navn) && empty($adresse) && !empty($telefonnummer))
{
    echo "adresse må fylles ut";
}
elseif(empty($navn) && !empty($adresse) && !empty($telefonnummer))
{
    echo "navn må fylles ut";
}
else 
{
    echo "alt er ok!"; //dersom alle felt inneholder skrift vil denne meldingen printes
}
?> 