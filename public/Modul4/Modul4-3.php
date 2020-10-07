<?php
?>
<html> 
<h1> Lottospill </h1>
</html>
<?php
    $navn = array(1 => 'Ola',
                        'Ingrid',
                        'Henrik',
                        'Kristin',
                        'Thomas',
                        'Marte',
                        'Aleksander',
                        'Sara',
                        'Kari',
                        'Pål');

    for ($nr=10; $nr>0; $nr--){
        echo $navn[$nr] . " er her<br />";
    }

    ?>