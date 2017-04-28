<?php

class AccountBO
{
    private $Id;
    private $NameSurname;
    private $Email;


    public function __construct($Id, $NameSurname, $Email)
    {
        $this->Id = $Id;
        $this->NameSurname = $NameSurname;
        $this->Email = $Email;
    }

    
    public function getId(){
        return $this->Id;
    }

    public function getNameSurname(){
        return $this->NameSurname;
    }

    public function getEmail(){
        return $this->Email;
    }
}