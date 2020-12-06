<html>
<!doctype html>
<head>
<meta charset="utf-8">
</head>

<title>Modul 5-1</title>
<h2>Etternavn:</h2>
<body>

<?php
$etternavn = $_GET['lname'] //predefinerer hva $etternavn skal gjøre, altså hente inputen
?>

<form action="5-1.php" method="GET"> <!--form action forteller systemet hva som skal skje dersom brukeren trykker "enter"-->
    <input type="text" id=lname name=lname placeholder="Etternavn" value="<?php echo $_GET['lname'];?>"> //

<?php
    if(isset($etternavn))
    {
        echo '<br/>Etternavn:'; print_r (ucwords(strtolower($etternavn))); echo  ''; //ucwords gjør at alle ord inne i formelen skrives med stor forbokstav
                                                                                     //endte også opp med å måtte bruke strtolower for å få det til å funke, men denne funksjonen ville gjort bokstavene små men overkjøres av første bestemmelse
    
?>
        <table border="2">
            <tr>
                <th> </th>
                <th>Informasjon</th>
            </tr>

<?php
    $a = array('Etternavn' => ucwords($etternavn));
        foreach($a as $info => $infomedlem);
        {
?>      <br>
            <tr>
                <td><?php echo $info ?></td>
                <td><?php echo $infomedlem ?></td>
            </tr>
<?php
        }
        echo '<br/>Ditt etternavn består av ' . strlen($_GET['lname']) . ' karakterer.<br/>'; //strlen viser hvor lang stringen er, altså hvor mange karakterer stringen inneholder

    }
    else   
        echo '<br/>Fyll inn etternavnet ditt'; //Hvis ingenting er registrert i formet, vises denne meldingen 

?> <br>

</body>
</html>
    