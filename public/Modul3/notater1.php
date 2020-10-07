<?php

    $medlemmer=array('Silje','Johan','Ola','Andreas','Sofie', 'Kristian');
    echo  $medlemmer[1];
?>

<br>
<br>

<?php

    print_r($medlemmer);
    var_dump($medlemmer);


?>
<br>
<br>
<h2>Mellomrom</h2>
<?php

    foreach($medlemmer as $key => $value)
        {
            echo $key. ' ' .$value.'<br/>'; //denne er veldig fin hvis man vil ha opp hele listen som en tabell (og med breakline går det nedover)
        }

?>
<br>
<br>

<h3>HTML Table</h3>
<style>
table {
font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 25%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<table border="5">
  <tr>
    <th>Key</th>
    <th>Value</th>
  </tr>
  <?php foreach($medlemmer as $key => $value) { ?>
  <tr>
    <td><?php echo $key ?></td>
    <td><?php echo $value ?></td>
  </tr>
 
  </tr>
  <?php }?>
</table>