<?php
    $msg ="";
    // if upload button is pressed
    if (isset($_POST['upload'])) {
        //the oath to store the uploaded image
        $target = "photos/".basename($_FILES['photos'] ['text']);
        // Definerer konstanter for å koble til databasen 
            define('MYSQL_VERT', 'db');
            define('MYSQL_BRUKER', 'dbuser');
            define('MYSQL_PASSORD', 'BACIT2020');
            define('MYSQL_DB', 'ergotests');

        //connect to the database
        $db = mysqli_connect(MYSQL_VERT, MYSQL_BRUKER, MYSQL_PASSORD, MYSQL_DB);

        // get all the submitted data from the form
        $image = $_FILES['photos']['text'];
        $text = $_POST['text'];

        $sql = "INSERT INTO images (photos, text) VALUES ('$photos', '$text')";
        mysqli_query($db, $sql); //Stores the submitted data into the database table: images

        //now lets move the uploaded image into the folder_ images
        if (move_uploaded_file($_FILES['photos']['tmp_name'], $target)) {
            $msg = "image uploaded successfully";
        } else {
            $msg = "There was a problem uploading image";
        }
    }

 
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Image upload</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id="content">
    <?php
       define('MYSQL_VERT', 'db');
       define('MYSQL_BRUKER', 'dbuser');
       define('MYSQL_PASSORD', 'BACIT2020');
       define('MYSQL_DB', 'ergotests');

            $db = mysqli_connect(MYSQL_VERT, MYSQL_BRUKER, MYSQL_PASSORD, MYSQL_DB);
            $sql = "SELECT * FROM photos";
            $result = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "<div id='img_div'>";
                    echo "<img src='images/".$row['image']."' >";
                    echo "<p>".$row['text']."</p>";
                echo "</div>";
            }
?>
            <form method="post" action="index.php" enctype="multipart/form-data">
            <input type="hidden" name="size" value="1000000">
            <div>
                <input type="file" name="image">
            </div>
            <div>
                <textarea name="text" cols="40" rows="4" placeholder="Say something about this image..."></textarea>
            </div>
            <div>
                <input type="submit" name="upload" value="Upload image">
            </div>
        </form>
    </div>
    </body>
</html>