<?php

require_once("Core/DBConnect.php");
require_once("Models/AccountModel.php");
require_once("Helpers/PasswordHelper.php");

class AccountController
{
    private $dbConnect;
    

    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }


    public function Register($model){
        $namesurname = $model->getNameSurname();
        $email = $model->getEmail();
        $password = $model->getPassword();

        $ph = new PasswordHelper();
        $passwordHash = $ph->Decrypt($password);
        
        $response = $this->dbConnect->execute("INSERT INTO UserTable (NameSurname, Email, Password) VALUES ('$namesurname', '$email', '$passwordHash')");
        return $response;
    }

    public function Login($model){
        $email = $model->getEmail();
        $password = $model->getPassword();
 echo $password;
        $response = $this->dbConnect->get("SELECT Id, NameSurname, Email FROM UserTable WHERE Email='$email' && Password='$password'");
        $data = $response->fetch_assoc();
        $model = new AccountModel($data["Id"], $data["NameSurname"], $data["Email"]);

        return $model;
    }
}