<html>
<head>

<title>Oppgave 2-1</title>
</head>


<body>

<?php
$Alder = "22";
$Navn = "Aleksander G. Hamre";


?>

<table border = "1">
    <tr>
        <th>Navn</th>
        <th>Alder</th>
    </tr>
    <tr>
    <td><?php echo $Navn;?></td>
    <td><?php echo $Alder;?></td>
    
    <h3>Med en numerert liste:</h3>

    <ol>

    <li>Personen heter <?php echo "$Navn.";?></li>
    <li><?php echo "$Navn er $Alder år.";?></li>

    </ol>

<h4> En punktvis liste:</h4>
    <ul>

    <li>Personen heter <?php echo "$Navn.";?></li>
    <li><?php echo "$Navn er $Alder år.";?></li>

    </ul>


<p> <?php echo "Navnet til personen er $Navn, og det antas at personen er $Alder år gammel.";?></p>

</body>


</html>