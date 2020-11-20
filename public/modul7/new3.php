<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title> 7-3</title>

        <form class="form-horizontal" name="editProfile" method="post" action="<?php echo 
        $_SERVER['PHP_SELF'] . '?id=' . $_GET['id']; ?>">
        <fieldset>

        <!-- Form Name-->
        <legend>Endre medlemsprofil</legend>

        <!--Text Input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="firstname">Fornavn</label>
            <div class="col-md-5">
            <input id="firstname" name ="firstname" type="text" value="<?php echo 
            $thisMember['firstname'];?>" class="form-control input-md" required="">
    <br>
            <label class="col-md-4 control-label" for="lastname">Etternavn</label>
            <div class="col-md-5">
            <input id="lastname" name ="lastname" type="text" value="<?php echo 
            $thisMember['lastname'];?>" class="form-control input-md" required="">
    <br>
            <label class="col-md-4 control-label" for="birthday">Fødselsdato</label>
            <div class="col-md-5">
            <input id="birthday" name ="birthday" type="date" value="<?php echo 
            $thisMember['birthday'];?>" class="form-control input-md" required="">
    <br>
            <label class="col-md-4 control-label" for="lastname">Gateadresse</label>
            <div class="col-md-5">
            <input id="adress" name ="adress" type="text" value="<?php echo 
            $thisMember['adress'];?>" class="form-control input-md" required="">
    <br>
            <label class="col-md-4 control-label" for="lastname">Postnummer</label>
            <div class="col-md-5">
            <input id="postnr" name ="postnr" type="number" pattern="[0-9]{4}" value="<?php echo 
            $thisMember['postnr'];?>" class="form-control input-md" required="">
    <br>
            <label class="col-md-4 control-label" for="lastname">Poststed</label>
            <div class="col-md-5">
            <input id="postoffice" name ="postoffice" type="text" value="<?php echo 
            $thisMember['postoffice'];?>" class="form-control input-md" required="">
    <br>
        <label for="paid-0">Kjønn</label><br>
            <input type="radio" name="gender" id="paid-0" required=""value="1"<?php if ($thisMember['gender'] ) {
                echo 'checked="checked"'; } ?>>
                Mann       
        </label>
    <br>
        <label for="paid-0">
            <input type="radio" name="gender" id="paid-0" value="0"<?php if ($thisMember['gender'] ) {
                echo 'checked="checked"'; } ?>>
                Kvinne        
        </label>
    <br>
            <label class="col-md-4 control-label" for="email">Epost</label>
            <div class="col-md-5">
            <input id="email" name ="email" type="text" value="<?php echo 
            $thisMember['email'];?>" class="form-control input-md" required="">
    <br>
            <label class="col-md-4 control-label" for="email">Tlf</label>
            <div class="col-md-5">
            <input id="tlf" name ="tlf" type="tel" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" value="<?php echo 
            $thisMember['tlf'];?>" class="form-control input-md" required="">
     <br>
            <label class="col-md-4 control-label" for="birthday">Medlem siden dato</label>
            <div class="col-md-5">
            <input id="membersince" name ="membersince" type="date" value="<?php echo 
            $thisMember['membersince'];?>" class="form-control input-md" required="">
    <br>
        <label for="paid-0">Interesser/Kursaktiviteter</label><br>
            <input type="radio" name="interests" id="interests" value=""<?php if ($thisMember['paid'] ) {
                echo 'checked="checked"'; } ?>>
                Fotball        
        </label>
    <br>
        <label for="paid-0">
            <input type="radio" name="interests" id="interests" value=""<?php if ($thisMember['paid'] ) {
                echo 'checked="checked"'; } ?>>
                Basketball        
        </label>
    <br>
        <label for="paid-0">
            <input type="radio" name="interests" id="interests" value=""<?php if ($thisMember['paid'] ) {
                echo 'checked="checked"'; } ?>>
                Håndball       
        </label>
    <br>
        <label for="paid-0">
            <input type="radio" name="interests" id="interests" value=""<?php if ($thisMember['paid'] ) {
                echo 'checked="checked"'; } ?>>
                Golf     
        </label>
    <br>
        <label for="paid-0">
            <input type="radio" name="interests" id="interests" value=""<?php if ($thisMember['paid'] ) {
                echo 'checked="checked"'; } ?>>
                Frisbeegolf        
        </label>


    <br>
        <label for="paid-0">Betalt kontingent?</label><br>
            <input type="radio" name="paid" id="paid-0" value="1"<?php if ($thisMember['paid'] ) {
                echo 'checked="checked"'; } ?>>
                Ja        
        </label>

      
    <br>
    <label for="paid-0">
            <input type="radio" name="paid" id="paid-0" value="0"<?php if ($thisMember['paid'] ) {
                echo 'checked="checked"'; } ?>>
                Nei        
        </label>
    <br>

    <button id="form-save" name="form-save" class="btn btn-success">Lagre</button>

        

