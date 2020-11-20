<?php
$deltakere = array( 'Silje' => 0, 'Sara' => 0, 'Ola' => 0, 'Henrik' => 0, 'Andreas' => 0, 'Helene' => 0, 'Martine' => 0, 'Erik' => 0, 'Jan' => 0,'Johan' => 0); 
    echo "Spillets deltakere er |Silje| |Sara| |Ola| |Henrik| |Andreas| |Helene| |Martine| |Erik| |Jan| |Johan|";
    echo '<br />';
    for ( $i=1; $i < count($deltakere ); $i++)
    while( count( $deltakere) > 1 )
    {
        foreach( $deltakere as $deltaker => $poeng )
        {
            $deltakere[$deltaker] = rand(1,50); //gir deltakerne et tall mellom 1 0g 50
        }
    }
    
?>