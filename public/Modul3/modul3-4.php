<!DOCTYPE html>
<html>
<body>

<form method="post" action=<?php echo $_SERVER['PHP_SELF'];?>><br>
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
    $telefonnummer= $_POST["telefonnummer"];
}

if(!empty($navn) && empty($adresse) && empty($telefonnummer))
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
    echo "alt er ok!";
}
?> 