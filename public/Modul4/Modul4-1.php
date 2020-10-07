<?php
   /* Lag et lite script som oppretter en matrise med heltall som indeks. 
    Matrisen skal ha indekser som 0, 3, 5, 7, 8 og 15.
    Skriv deretter ut innholdet i matrisen ved hjelp av funksjonen print_r() 
    og ved å bruke en løkke (som du lærte i forrige modul). */
 ?>
 <form action="post">


 </form>

 <?php /*
    $cars = array (
        array("Volvo",22,18),
        array("BMW",15,13),
        array("Saab",5,2),
        array("Land Rover",17,15)
      );
 ?>

<?php
    echo $cars[0][0].": In stock: ".$cars[0][1].", sold: ".$cars[0][2].".<br>";
    echo $cars[1][0].": In stock: ".$cars[1][1].", sold: ".$cars[1][2].".<br>";
    echo $cars[2][0].": In stock: ".$cars[2][1].", sold: ".$cars[2][2].".<br>";
    echo $cars[3][0].": In stock: ".$cars[3][1].", sold: ".$cars[3][2].".<br>";
?>
<?php
    for ($row = 0; $row < 4; $row++) {
        echo "<p><b>Row number $row</b></p>";
        echo "<ul>";
    for ($col = 0; $col < 3; $col++) {
         echo "<li>".$cars[$row][$col]."</li>";
  }
        echo "</ul>";
} */
?>
<table border="5">
    <tr>
        <th> Indeks </th>
        <th> Verdi </th>

    </tr>




<?php
        $heltall = array (0 => "1", 3 => "2", 5 => "3", 7 => "4", 8 => "5", 15 => "6"); //definerer variabelen som en array med hele tall
       print_r($heltall);
        ?>
        <br> <br>
        <?php
        foreach($heltall as $key=>$value)
            { ?>
            <tr>
                <td><?php echo $key?></td>
                <td><?php echo $value?></td>
            </tr>                                
            <?php
            }
            ?>


<?php /*
    $mnd = array (1 => 'Januar',
                        'Februar',
                        'Mars',
                        'April',
                        'Mai',
                        'Juni',
                        'Juli',
                        'August',
                        'September',
                        'Oktober',
                        'November',
                        'Desember'); //ender matrisen her
    for ($nr=12; $nr>0; $nr--) {
        print_r( $mnd[$nr] . " er måned nummer $nr<br />");
    } */
?>