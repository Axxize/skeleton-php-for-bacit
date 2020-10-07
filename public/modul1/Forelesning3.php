<style>
.ting{
    background-color: lightblue;
        align-self: center;
        text-align: right;
}
</style>
<body style="background-color: #96D997; align-content: center;text-align: center;">
<?php
$i = 17;
If( $i<10 )
{
    echo $i . "er under 10";

}
Elseif( $i<20 )
{echo $i . " er mellom 10 og 20";

}
Else
{
    echo $i . "er ikke under 10";
}
?>
<div class="ting">
Hei på deg
</div>
</body>