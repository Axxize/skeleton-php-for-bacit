<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Oppgave 2: liten kalkulator</title>
</head>

<body>
    <form>
        <input type="text" name="num1" placeholder="number 1">
        <input type="text" name="num2" placeholder="number 2">
        <select name="operator">
            <option>None</option> 
            <option>Add</option> 
            <option>Multiply</option> 
            <option>Divide</option> 
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
        switch ($operator) {
            case "None":
                echo "Please select a method!";
            Break;
            case "Add":
                echo $result1 + $result2;
            Break;
            case "Multiply":
                echo $result1 * $result2;
            Break;
            case "Divide":
                echo $result1 / $result2;
            Break;
            case "Subtract":
                echo $result1 - $result2;
                Break;   
            case "Average":
                echo ($result1 + $result2) / 2;
            Break;
            }
    
        }



        ?>