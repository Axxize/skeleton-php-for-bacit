<!DOCTYPE html> 

<html> 
<?php /*
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
<br><h1>Modul 9-2: Filer</h1>


<?php
$dir = './'; 
$dirRef = opendir($dir); //En handler, hjelper med å finne frem. 
// Skrive ut innholdet, bruker en while løkke som går så lenge det finnes filer å hente.

//Opprette en tabell;
?>


<?php

echo "<table border='1'>
<tr>
    <th>Filnavn</th> 
    <th>Filtype</th>
    <th>Filstørrelse</th>
    <th>Dato modifisert</th> 
    <th>Kjørbar?</th> 
    <th>Leselig?</th> 
    <th>Skrivbar?</th> <br><br>
  </tr>";

while($next = readdir($dirRef))
{   
echo "<tr>";
echo  "<td>" .$next. "</td>";
echo  "<td>" .filetype($dir. $next). "</td>";
echo  "<td>" .filesize($dir. $next). "</td>";
echo  "<td>" .date('d.m.Y H:i:s'), filemtime($dir . $next). "</td>";
echo  "<td>" .(is_executable($next) ? "YES" : "NO" ). "</td>";
echo  "<td>" .(is_readable($next) ? "YES" : "NO" ). "</td>";
echo  "<td>" .(is_writeable($next) ? "YES" : "NO" ). "</td>";
echo  "</tr>";

}
echo "</table>"; 

closedir($dirRef); //avslutter oppkoblingen. 

?>