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
    for ($i = 1; $i < 10; $i++) {
        echo $i, '<br>';
        $sum = $sum+$i;
    }
    
?>

<?php
    echo "Juhuu, ferdig å telle! Summen av tallene ble $sum";
?>


</head>

</html>