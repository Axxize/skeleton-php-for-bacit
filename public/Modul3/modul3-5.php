<?php

date_default_timezone_set('Europe/Oslo'); //Endrer tidssone til lokal tid
$navn = "Ola";
$Hour = date('G'); //bruker G for å få 24 timers format uten begynnende 0
$date = date('G:i'); //la til denne variabelen for å kunne fortelle brukeren hva klokken er med timer og minutter
if ( $Hour >= 5 && $Hour <= 11 ) {
    echo "God morgen $navn! Klokken er $date";
} else if ( $Hour >= 12 && $Hour <= 18 ) {
    echo "God ettermiddag $navn! Klokken er $date";
} else if ( $Hour >= 19 || $Hour <= 4 ) {
    echo "God kveld $navn! Klokken er $date";
}
?>