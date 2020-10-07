<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Oppgave 2: liten kalkulator</title>
</head>
<?php /*
<body>
    <form>
        <input type="text" name="num1" placeholder="number 1">
        <input type="text" name="num2" placeholder="number 2">
        <select name="operator">
            <option>None</option> 
            <option>Add</option> 
            <option>Subtract</option> 
            <option>Average</option> 
        </select>
        <br>
        <button Type="submit" name="submit" Value= "submit">
            Calculate
        </button>
</form> 

<p>The answer is:</p>



<?php
    if (isset($_GET['submit'])){
        $result1 = $_GET['num1'];
        $result2 = $_GET['num2'];
        $operator = $_GET['operator'];
        for ($i = 0; $i <= 10; $i++){
            echo $result1 + $result2;'<br/>';
            $result1=$result1+1;
        }
        for ($i = 0; $i <= 10; $i++){
            echo $result1 - $result2;'<br/>';
            $result1=$result1+1;
        }
        for ($i = 0; $i <= 10; $i++){ 
            echo $result1 + $result2/2;'<br/>';
            $result1=$result1+1;
        } 

    }
?>
*/ ?>
<h1>En liten regnemaskin</h1>
<h3>Denne baserer seg på at tall 1=10 og tall 2=20, og at tall 1 øker med 1 hver runde.</h3>
<?php
    for($tall1=10, $tall2=20; $sum=$tall1 + $tall2, $differanse=$tall2 - $tall1, $gjennomsnitt = $sum/2, $tall1 <=20; $tall1++)
        {
            echo "<br>Summen er $sum, differansen: $differanse og gjennomsnittet er $gjennomsnitt<br>";
        }
?>