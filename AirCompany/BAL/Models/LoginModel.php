<?php

class LoginModel
{
    private $Email;
    private $Password;


    public function __construct($Email, $Password)
    {
        $this->Email = $Email;
        $this->Password = $Password;
    }


    public function getEmail(){
        return $this->Email;
    }

    public function getPassword(){
        return $this->Password;
    }
}

?>