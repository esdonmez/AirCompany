<?php

require_once("../DAL/DBConnect.php");
require_once("../BO/AccountBO.php");
require_once("/Models/LoginModel.php");
require_once("/Models/RegisterModel.php");

class AccountBAL
{
    private $dbConnect;
    

    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }


    public function Register()
    {

    }

    public function Login()
    {

    }
}

?>