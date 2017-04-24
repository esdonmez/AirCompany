<?php

class RegisterModel
{
    private $NameSurname;
    private $Email;
    private $Password;


    public function __construct($NameSurname, $Email, $Password)
    {
        $this->NameSurname = $NameSurname;
        $this->Email = $Email;
        $this->Password = $Password;
    }


    public function getNameSurname(){
        return $this->NameSurname;
    }

    public function getEmail(){
        return $this->Email;
    }

    public function getPassword(){
        return $this->Password;
    }
}

?>