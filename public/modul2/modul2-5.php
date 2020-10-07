<html>

<head>
        <title>Informasjon om medlemmer</title>
</head>
<body>
    <?php
        $Fornavn = "Aleksander";
        $Etternavn = "Hamre";
        $Adresse = "Bergstien 6d";
        $Mobilnummer = "46 48 00 88";
        $Epost = "Aleksh17@uia.no";
        $Fødselsdato = "12.09.1997";
        $Kjønn = "Mann";
        $Interesser = "Golf";
        $Kursaktiviteter = "Sannsynligvis";
        $Medlemsidendato = "06.09.2020";
        $Kontingentstatus = "Nei";
    ?>

    <table border="250">
        <tr>
            <th>Fornavn</th>
            <th>Etternavn</th>
            <th>Adresse</th>
            <th>Mobilnummer</th>
            <th>Epost</th>
            <th>Fødselsdato</th>
            <th>Kjønn</th>
            <th>Interesser</th>
            <th>Kursaktiviteter</th>
            <th>Medlem siden dato</th>
            <th>Kontingentstatus</th>
        </tr>
<tr>
    <td><?php echo $Fornavn;?></td>
    <td><?php echo $Etternavn;?></td>
    <td><?php echo $Adresse;?></td>
    <td><?php echo $Mobilnummer;?></td>
    <td><?php echo $Epost;?></td>
    <td><?php echo $Fødselsdato;?></td>
    <td><?php echo $Kjønn;?></td>
    <td><?php echo $Interesser;?></td>
    <td><?php echo $Kursaktiviteter;?></td>
    <td><?php echo $Medlemsidendato;?></td>
    <td><?php echo $Kontingentstatus;?></td>
</tr>
</table>
</body>
</html>
