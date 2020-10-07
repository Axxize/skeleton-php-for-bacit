<?php
?>
    <table border="5">
    <tr>
        <th> Indeks </th>
        <th> Verdi </th>

    </tr>

<?php
    $indeks1 = array(0 => "blå", 1 => "grønn", 2 => "rød", 3 => "gul", 4 => "lilla", 
                5 => "oransje", 6 => "hvit", 7 => "sort", 8 => "beige", 9 => "fiolett");
    $indeks2 = array(10 => "Mercedes", 11 => "Audi", 12 => "Skoda", 13 => "Opel", 14 => "Seat", 
                15 => "Toyota", 16 => "Porsche", 17 => "Nissan", 18 => "Ferrari", 19 => "Renault");

    for($i=0; $i <=9; $i++)
    {
        $indeks1[$i] = "$i"; 
    }
?> 
<?php
        print_r($indeks2);
?>
<?php
        foreach($indeks2 as $key=>$value)
            { ?>
            <tr>
                <td><?php echo $key?></td>
                <td><?php echo $value?></td>
            </tr>                                
            <?php
            }
            ?>


