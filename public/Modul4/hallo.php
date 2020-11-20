<?php
?>
    <table border="5">
    <tr>
        <th> Indeks </th>
        <th> Verdi </th>

    </tr>

<?php
    $indeks1 = array(0 => "100", 
                    1 => "110", 
                    2 => "120", 
                    3 => "130", 
                    4 => "140", 
                    5 => "150", 
                    6 => "160", 
                    7 => "170", 
                    8 => "180", 
                    9 => "190");

    $indeks2 = array(10 => "10", 
                    11 => "11", 
                    12 => "12", 
                    13 => "13", 
                    14 => "14", 
                    15 => "15", 
                    16 => "16", 
                    17 => "17", 
                    18 => "18", 
                    19 => "19");

    for($i=0; $i <=9; $i++)
    {
        $indeks2[$i] = "$i"; 
    }
    // print_r(indeks1)
        print_r(array_replace($indeks1,$indeks2)); //Legger inn array_replace som script som vil endre verdiene i matrisen
    
?>
<?php
        foreach($indeks1 as $key=>$value)
            { ?>
            <tr>
                <td><?php echo $key?></td>
                <td><?php echo $value?></td>
            </tr>                                
            <?php
            }
            ?>
             <table border="5">
    <tr>
        <th> Indeks+10 </th>
        <th> Verdi </th>

    </tr>
        <?php
        
        $New_start_index = 10;  //denne gjør at indeksen nå har økt med 10 
    
        $indeks1 = array_combine(range($New_start_index,  
                        count($indeks1) + ($New_start_index-1)), 
                        array_values($indeks1)); 
          
        echo "\nMatrise etter å ha re-indekstert\n"; 
          
        // Using foreach loop to print array elements 
        foreach( $indeks1 as $key => $value) {  
            echo "Indeks: ".$key." Value: ".$value."\n";  
        } 
          
        ?> 





<?php 
  /*
  // Declare an associative array 
  $arr = array ( 
      0 => 'Tony', 
      1 => 'Stark', 
      2 => 'Iron',  
      3 => 'Man' 
  ); 
    
  echo "Array before re-indexing\n"; 
    
  // Using foreach loop to print array elements 
  foreach( $arr as $key => $value) {  
      echo "Index: " . $key . " Value: " . $value . "\n";  
  } 
    
  // Set the index number from three 
  $New_start_index = 3; 
    
  $arr = array_combine(range($New_start_index,  
                  count($arr) + ($New_start_index-1)), 
                  array_values($arr)); 
    
  echo "\nArray after re-indexing\n"; 
    
  // Using foreach loop to print array elements 
  foreach( $arr as $key => $value) {  
      echo "Index: ".$key." Value: ".$value."\n";  
  } 
    */
  ?> 