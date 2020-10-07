<?php

echo "<table border=\"1\">";

for ($r =1; $r < 10; $r++){

    echo('<tr>');

    for ($c = 1; $c < 11; $c++)
        echo( '<td>' .$c*$r.'</td>');

    echo('</tr>');

}

echo("</table>");




?>


