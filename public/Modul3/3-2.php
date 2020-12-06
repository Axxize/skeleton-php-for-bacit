<?php 
/*Lag et script som teller fra 0 til 9 ved hjelp av en for-løkke og presenterer tallet på skjermen.
Du må også regne ut summen av tallene. Når telleren har kommet til 9, skal følgende tekst presenteres 
på ny linje (etter tallet 9): «Juhuu, ferdig å telle! Summen av tallene ble [sum]». 
Hint: Bruk <br> på slutten av HTML-strengen (da tvinger du frem linjeskift for hver iterasjon).*/
?>

<?php
?>

<html>
<head>
    <body>    
    </body>
    <br>
<?php
    $sum = 0;
    for ($i = 1; $i < 10; $i++) { // $1 er lik 1, og repeteres med økning fra $1++ frem til verdien når verdien under 10, altså 9.
        echo $i, '<br>'; //printer $i frem til den når 9.
        $sum = $sum+$i; //setter variabelen $sum lik seg selv pluss 1. 
    }
    
?>

<?php
    echo "Juhuu, ferdig å telle! Summen av tallene ble $sum"; //printer meldingen med variabelen $sum tilsvarende seg selv pluss 1 
?>


</head>

</html>