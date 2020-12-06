<?php

/* 
    Denne filen er selve opplastingsfilen som gjør at et bilde man velger lastes opp i databasen vår, under filen "Bilde". Dette er et steg
    vi gjorde fordi vi synes det var spennende å utforske. Samt at vi tror det er nyttig for videre oppgaver/prosjektet.

*/
define('MYSQL_VERT', 'db');
define('MYSQL_BRUKER', 'dbuser');
define('MYSQL_PASSORD', 'BACIT2020');
define('MYSQL_DB', 'ergotests');

$tilkobling = new mysqli( MYSQL_VERT, MYSQL_BRUKER, MYSQL_PASSORD, MYSQL_DB );
if ( $tilkobling->connect_error )
{
die('Tilkoblingen til databasen feilet. Vennligst forsøk igjen senere.');
exit();
    }

if(isset($_POST['reg-send']))
{
    /* Definerer array for meldinger */
    $opMessage = array();

    /* Filopplastningen, sjekke om noe er lastet opp */
    if(is_uploaded_file($_FILES['file']['tmp_name']))
    {
        //print_r($_FILES), om vi vil se innholdet i dette array kan vi kjøre denne.
        $fileType = $_FILES['file']['type'];
        $filesize = $_FILES['file']['size'];

        //Sette begrensninger på hvilke type filer vi skal laste opp. 
        $fileAllow = array  (
                                'image/jpeg',
                                'image/jpg',
                                'image/png',
                            );
        $maxFileSize = 2100000; //Ca 2 mb(?)
        $dir = '../'; //Altså hvor filen skal havne. Her, i modul 3. Katalogen må eksistere. 


        /*Finn Suffix */
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
        $pk = 1; //primary key = 1
        /* Når en logger på en bruker, så er det lurt --> Kunne hatt Id på påloggende bruker i en session variabel. */
        $fileName = $pk . '.' . $suffix; //suffix inneholder per nå ingenting. 

        /*Eksisterer denne filen? Dersom vi ikke sjekker, så vil den bli overskrivet. Kan være greit begge veier. */
        while(file_exists($dir . $fileName))
        {
            //Teste om filen eksisterer, helt til vi kommer til ett navn som ikke finnes fra før(?)
            $fileName = $pk . '_' . date('YmdHis') . '.' . $suffix;
        }

        /* Filtype akseptert? */
        if(!in_array($fileType, $fileAllow))
        {
            $opMessage[] = 'Ugyldig filtype'; //Om det ikke er her så skal det skrives feilmelding
        }

        /* Filstørrelse? */
        if($fileSize > $maxFileSize)
        {
            $opMessage[] = 'Filen er for stor';
        }

        /* Har dette gått bra? */
        if(empty($opMessage)) //Utføres så lenge array er tomt, altså dersom det er feil kjøres ikke koden og motsatt. 
        {
            /*Vi flytter filen*/
            $fileHome = $dir . $fileName;
            $uploadedFile = move_uploaded_file($_FILES['file']['tmp_name'], $fileHome ); //Returnerer true eller false. 

        /* Gikk dette bra? */
        if($uploadedFile)
        {
            //if(isset($_POST['but_upload'])){
                $uploadedFile = $_POST['file'] && $_POST['tmp_name'];
                $target_dir = "upload/";
                
                    $target_fil = $target_dir.basename($_FILES['file']['tmp_name']);
        
                    //Fil ekstend
                    $extension = strtolower(pathinfo($target_fil, PATHINFO_EXTENSION));
        
                    //Valider fil ekstend. 
                    //$extension_arr = array('jpg', 'jpeg', 'png');
        
                    //Se om ekst. eskisterer. 
                    //if(in_array($extension, $extension_arr)){
        
                        //Koverter til base64
                        $image_base64 = base64_encode(file_get_contents($_POST['file']['tmp_name']));
                        $Bilde = 'data::image/'.$extension. 'base64'. $image_base64;
                        //Bildet blir med dette lastet opp, men det kommer feilmelding om linje 101. uvisst årsak.
                        //Lagre bilde i upload
                        //if(move_uploaded_files($_FILES['file']['tmp_name'], $target_file)){
                            
                            //Legg inn
                            $sql = "INSERT INTO Bilde (Filtype) VALUES('" . $fileName . "')"; //Får kun opp uploadedFile i database. 
                            
                            //Forbered spørring #1
                            $stmt = $tilkobling->prepare($sql);
        
                            #2 Koble sammen paramtere med spørring
                            $stmt->bind_param("s", $fileName);
        
                            if(($stmt->execute()))
                                {
                                    echo 'Bildet er registrert i databasen. Gjerne sjekk det ut.';
                                }
                           
                            $stmt->close();
            $opMessage[] = 'Filen er lastet opp'; //En viss løsning. Bildet kommer derimot ikke til å vises i medlemsprofilen til medlemmet. Skal vell også inn innenfor en database. Hvordan?
            ?>
            <table border = "1">
    <tr>
        <th>ID</th>
        <th>Filtype</th>
    </tr>
    <tr>
    <td><?php echo $uploadedFile, $i++;?></td>
    <td><?php echo $fileType;?></td>
    <?php
            $i > 0;
            $uploadedFile = 'Dette er ett bilde';
            echo 'Filtypen på bilde er . ' . $fileType . '.';
            
/* Det kommer feilmelding når jeg sender bildet inn til databasen, men det kjører. Jeg finner ikke feilen. */
                    
            }

        //}
        else
        {
            $opMessage[] = 'Filen er ikke lastet opp';
        }

        }
    }
    else
    {
            // Noe gikk galt?
            $opMessage[] = 'Noe gikk galt med opplastningen'; //Tilstreb å gi bedre tilbakemelding på feilmeldinger. 
    }
}

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Opplastning av fil</title>
</head>

<body>
    <p><?php if ( isset( $opMessage ) ) { foreach ( $opMessage as $message ) { echo $message; }; } //Array med beskjeder som skrives ut.
    // Feilmeldinger. Kan også vise melding om at ting gikk bra. ?></p>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data"> <?php //Encryption type, må være der når det er filopplastning ?>
        <div>
            <div>
                <input name="file" type="file" size="20"> <?php // Type må være lik file. ?>
            </div>
        </div>
        <div class="row"> <?php //CSS ?>
            <input type="submit" name="reg-send" class="button" value="Last opp foto">
        </div>
    </form>
</body>
</html>