<?php
function convert_seconds($seconds)
{
    $dt1 = new DateTime("@0");
    $dt2 = new DateTime("@$seconds");
    return $dt1->diff($dt2)->format('4400 sekunder er det samme som: %d Dager, %h timer, %i minutter og %s sekunder');
    }
echo convert_seconds(4400)."\n";


?>