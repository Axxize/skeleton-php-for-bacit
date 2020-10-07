<html>
<head>

</head>
<body>
<form action="modul3-1.php" method="post">
    <input type="text" name="name" placeholder="Name">
    <input type="number" name="age" placeholder="Age">
    <button type="submit">Er du myndig?</button>

</form>

<?php
    if(isset($_POST['name'], $_POST['age'])){
        $name = $_POST['name'];
        $age = (int)$_POST['age'];

    
    if (empty( $_POST['name'] ) )
    {
    echo 'Du har ikke oppgitt navn <br />';
    }
    if (empty( $_POST['age'] ) )
    {
    echo 'Du har ikke oppgitt alder <br />';
    }

    switch($age) {
        case $age < 18:
            echo "du heter $name og er $age år, du er derfor ikke myndig!";
        break;
        case $age > 17:
            echo "Du heter $name og er $age år, du er derfor myndig!";
        break;
    }
    }
?>
</body>

</html>