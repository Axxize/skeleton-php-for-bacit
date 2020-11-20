<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Test av tabell</title>

<?php
$deltakere = array( 'Silje' => 0, 'Sara' => 0, 'Ola' => 0, 'Henrik' => 0, 'Andreas' => 0, 'Helene' => 0, 'Martine' => 0, 'Erik' => 0, 'Jan' => 0,'Johan' => 0); 
    echo "Spillets deltakere er |Silje| |Sara| |Ola| |Henrik| |Andreas| |Helene| |Martine| |Erik| |Jan| |Johan|";
    echo '<br />';
    for ( $i=1; $i < count($deltakere ); $i++)
    while( count( $deltakere) > 1 )
    
        foreach( $deltakere as $deltaker => $poeng )
        
    
       // arsort( $deltakere );
            echo '<br />';
        print_r( $deltakere);
        echo "Den tapende deltakeren er $deltaker med $poeng poeng";
    
       $lavesteverdi = min( $deltakere ); 
        do
        {
            $fjernet = array_splice( $deltakere, 0, 1);

            //skriver ut navnet på den som blir fjernet
            foreach( $fjernet as $navn => $poengsum )
            {
                echo "ute av konkurransen i runde <strong>" . $runde . "</strong>: " . $navn;
            } 
        }
            while( min( $deltakere ) == $lavesteverdi );
        $fjernet = array_pop( $deltakere );
    
        echo $fjernet . '<br />';
            echo '<br />'; 
    
    print_r( $deltakere);
    echo end( $deltakere );
?> 



</head>
</html>
