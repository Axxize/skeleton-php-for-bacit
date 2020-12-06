<!DOCTYPE = html>
<meta charset-UTF8>
    <head>
        <h1><p>Besvarelse på modul 9-1</p></h1>


<?php
/* Skjema sendt?*/
if ( isset( $_POST['reg-send'] ) )
{
    // Definere array for meldinger
    $opMessage = array();

    // filopplastingen
    if( is_uploaded_file( $_FILES['photo']['tmp_name'] ) ) //superglobalt array som heter $_FILES, brukes til å uploade fileer
    {
       // print_r( $_FILES ); hvis man har lyst til å se hva som ligger inne i $_FILES arrayet
        $fileType = $_FILES['photo']['type'];
        $fileSize = $_FILES['photo']['type'];

        $fileAllow = array( //dette arrayet definerer hvilke filer som opplastningen aksepterer
                            'image/jpeg',
                            'image/jpg',
                            'image/png' );

        $maxFileSize = 2100000; //setter max grense på tillat filstørrelse 
        $dir = '../';

        // Finn suffix, setter hvilke filtyper som godtas
        switch($fileType) 
        {
            case 'image/jpeg':
                $suffix = 'jpg';
            break;
            case 'image/jpg':
                $suffix = 'jpg';
            break;
            case 'image/png':
                $suffix = 'png';
            break;
        }

        //Filnavn?
        $pk = 1; // kunne hatt id lagret i $_SESSION 
        $fileName = $pk . '.' . $suffix;
        //eksisterer denne filen?
        while( file_exists( $dir . $fileName) )
        {
            $fileName = $pk . '_' . date( 'YmdHis' ) . '.' . $suffix;
        }

        //filtype akseptert?
        if( !in_array( $fileType, $fileAllow ) ) //sjekker om den ikke er i array ved bruk av "!"
        {
            $opMessage[] = "Ugyldig filtype";
        }

        //Filstørrelse?
        if( $fileSize > $maxFileSize) 
        {
            $opMessage[] = "filen er for stor";
        }

        //har dette gått bra?
        if( empty( $opMessage ) ) //denne vil bare vises hvis det ikke ligger noe i arrayet.
        {
            //vi flytter filen
            $fileHome = $dir . $fileName; 
            $uploadedFile = move_uploaded_file( $_FILES['photo']['tmp_name'], $fileHome );

            //gikk dette bra?
            if ( $uploadedFile )
            {
                $opMessage[] = "Filen er lastet opp";
            ?>
            <table border ="1">
        <tr>
                <th>ID</th>
                <th>Filtype</th>
        </tr>
        <tr>
                <td><?php echo $uploadedFile, $i++;?></td>
                <td><?php echo $fileType;?></td>
        </tr>
        <?php  
            $i > 0;
            $uploadedFile = "Dette er et bilde";
            echo 'Filtypen på bildet er . ' . $fileType . '.';

            }
            else
            {
                $opMessage[] = "Filen er ikke lastet opp";
            }
        }
    }
    else
    {
        //Noe gikk galt?
        $opMessage[] = "Noe gikk galt med opplastningen"; //ved bruk av firkant parantes legger man til et element 

    }

}



?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Modul 9 oppgave 1</title>
</head>

<body>
    <p><?php if ( isset( $opMessage ) ) { foreach ( $opMessage as $message ) { echo $message; }; } ?></p> <!--array som skriver ut beskjeder, typ feilmeldinger eller at ting gikk bra-->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data"> <!--når du skriver PHP_SELF så slipper man å endre hele tiden. når man laster opp filer må man ha encryption type.-->
        <div>
            <div>
                <input name="photo" type="file" size="20"> <!--type må være "file" -->
            </div>
        </div>
        <div class="row"> <!--class = "row" er hentet fra css, ikke viktig-->
            <input type="submit" name='reg-send' class="button" value="Last opp foto">
        </div>
    </form>
    <h3>Hei på deg</h3>
</body>
</html>