<?php
$dir = "../public/"; // denne viser katalogen vi befinner i akkurat nå. det som er før skråstreken er der vi er nå. 
$dirRef = opendir( $dir );

while( $next = readdir( $dirRef ) )
{
    echo "Filnavn: " . $next . "<br/>";
    echo "Filtype: " . filetype( $dir . $next ). "<br/>"; //sier hva slags type fil det er
    echo "Filstr: " . filesize( $dir . $next ). "<br/>"; //forteller
    echo "Modifisert: " . date( 'd.m.Y H:i:s', filemtime( $dir . $next ) ) . "<br/><br/>"; //får vite når filen er modifisert
} 
closedir( $dirRef );

/* ./ = samme katalog
../ = opp en katalog
../filer = opp en katalog og inn en katalog "filer"
../../ = opp to kataloger
../../filer = opp to kataloger og inn i filer
*/
?>
