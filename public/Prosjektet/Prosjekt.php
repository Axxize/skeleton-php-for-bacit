<?php

class Users {

    public $Fornavn;
    public $Etternavn;
    public $Kjønn;
    private $Fødselsdato;
    private $Gateadresse;
    private $Postnummer;
    private $Poststed;
    private $Telefonnummer;
    public $Epost;
    public $Interesser;
    public $Kursaktiviteter;
    private $Medlem_Siden_Dato;
    private $Kontingentstatus;
}

class Admin extends Users{
    var $is_admin = true;
}

class Members extends Users{    
    var $is_admin = false;
}

class Current_Members extends Users {
    var $current_Member = true;
}
class Former_Member extends Users {
    var $current = false;
}

class aktiviteter{
    public $Fotball;
    public $Basketball;
    public $Golf;
    public $Tennis;
    public $Håndball;
} 