<!DOCTYPE html>
<html>
    <body>
    <form method= "post" action=<?php echo $_SERVER['PHP_SELF'];?>>
        <label for="fornavn">Fornavn</label><br>
        <input type="text" id="fornavn" name="fornavn" value="<?php if(isset($_POST['fornavn'])){echo $_POST['fornavn'];
        }?>"><br>

        <label for="etternavn">Etternavn</label><br>
        <input type="text" id="etternavn" name="etternavn" value="<?php if(isset($_POST['etternavn'])){echo $_POST['etternavn'];
        }?>"><br>

        <label for="adresse">Adresse</label><br>
        <input type="text" id="adresse" name="adresse" value="<?php if(isset($_POST['adresse'])){echo $_POST['adresse'];
        }?>"><br>

        <label for="telefonnummer">Telefonnummer</label><br>
        <input type="tel" id="telefonnummer" name="telefonnummer" placeholder="123 45 678" pattern="[0-9]{3}[0-9]{2}[0-9]{3}"value="<?php if(isset($_POST['telefonnummer'])){echo $_POST['telefonnummer'];
        }?>"><br>

        <label for="epost">Epost</label><br>
        <input type="email" id="epost" name="epost" value="<?php if(isset($_POST['epost'])){echo $_POST['epost'];
        }?>"><br>

        <label for="fødselsdato">Fødselsdato</label><br>
        <input type="date" id="fødselsdato" name="fødselsdato" value="<?php if(isset($_POST['fødselsdato'])){echo $_POST['fødelsdato'];
        }?>"><br>

        <label for="kjønn">Kjønn</label><br>
        <input type="kjønn" id="kjønn" name="kjønn" value="<?php if(isset($_POST['kjønn'])){echo $_POST['kjønn'];
        }?>"><br>

        <label for="interesser">Interesser</label><br>
        <input type="text" id="interesser" name="interesser" value="<?php if(isset($_POST['interesser'])){echo $_POST['interesser'];
        }?>"><br>

        <label for="Kursaktiviteter">Kursaktiviteter</label><br>
        <input type="text" id="kursaktiviteter" name="kursaktiviteter" value="<?php if(isset($_POST['kursaktiviteter'])){echo $_POST['kursaktiviteter'];
        }?>"><br>

        <label for="medlemsidendato">Medlem siden dato</label><br>
        <input type="date" id="medlemsidendato" name="medlemsidendato" value="<?php if(isset($_POST['medlemsidendato'])){echo $_POST['medlemsidendato'];
        }?>"><br>

        <label for="kontingentstatus">Kontingentstatus</label><br>
        <input type="text" id="kontingentstatus" name="kontingentstsatus" value="<?php if(isset($_POST['kontingenstatus'])){echo $_POST['kontingenstatus'];
        }?>"><br>

        <input type="submit" value="submit" name="submit">
    </form>

    <?php
    if(isset($_POST['submit']))
        {
            $melding = array();

            $info = array('Fornavn: ' => $_POST['fornavn'], 'Etternavn: ' => $_POST['etternavn'], 'Adresse: ' => $_POST['adresse'], 
            'Telefonnummer: ' => $_POST['telefonnummer'], 'Epost: ' => $_POST['epost'], 'Fødselsdato: ' => $_POST['fødselsdato'],
            'Kjønn: ' => $_POST['kjønn'], 'Interesser: ' => $_POST['interesser'], 'Kursaktiviteter: ' => $_POST['kursaktiviteter'],
            'Medlem siden dato: ' => $_POST['medlemsidendato'], 'Kontingentstatus: ' => $_POST['kontingentstatus']);

            if(empty($_POST['fornavn']))
            {
                $melding[] = 'Du må fylle inn fornavn';
            }
            if(empty($_POST['etternavn']))
            {
                $melding[] = 'Du må fylle inn etternavn';
            }
            if(empty($_POST['adresse']))
            {
                $melding[] = 'Du må fylle inn adresse';
            }
            if(empty($_POST['telefonnummer']))
            {
                $melding[] = 'Du må fylle inn telefonnummer';
            }
            if(empty($_POST['epost']))
            {
                $melding[] = 'Du må fylle inn epost';
            }
            if(empty($_POST['fødselsdato']))
            {
                $melding[] = 'Du må fylle inn fødselsdato';
            }
            if(empty($_POST['kjønn']))
            {
                $melding[] = 'Du må fylle inn kjønn';
            }
            if(empty($_POST['interesser']))
            {
                $melding[] = 'Du må fylle inn interesser';
            }
            if(empty($_POST['kursaktiviteter']))
            {
                $melding[] = 'Du må fylle inn kursaktiviteter';
            }
            if(empty($_POST['medlemsidendato']))
            {
                $melding[] = 'Du må fylle inn medlem siden dato';
            }
            if(empty($_POST['kontingentstatus']))
            {
                $melding[] = 'Du må fylle inn kontingentstatus';
            }
        } 
        // hvis ingen feilmeldinger, legg inn i databasen INSERT_INTO 
        
        /*
        //det kommende er et forsøk på å inkludere 4-5 
            $medlem = implode('<br />', array_map(
                function ($v, $k) { return sprintf("%s %s", $k, $v); },
                $info,
                array_keys($info)
            ));

            if(empty($melding))
            {
                echo 'Det er registrert følgende informasjon om deg: <br />' . $medlem;
            }

            else
            {
                for($i =0; $i <count($melding); $i++)
                {
                    echo $melding[$i] . '<br>';
                }
            }
        } */
    ?>
    </body>
</html> 