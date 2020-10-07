<?php
  

   //echo $tall=rand(1,34);

?>

<?php
echo "Lottorekke" . '<br />';

$numbers = [];

$i = 1;

while($i <= 10)
{
    $number = mt_rand(1, 34);

    if(!in_array($number, $numbers))
    {
        array_push($numbers, $number);
        $i++;
    }
}

sort($numbers);

echo implode(" - ", $numbers);
?>