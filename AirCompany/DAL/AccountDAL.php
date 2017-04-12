<?php

include("../BO/AccountBO.php");
include("Core/DBConnect.php");

class AccountDAL
{
    private $dbConnect;


    public function AccountDAL()
    {
        $this->dbConnect = new DBConnect();
    }


    public function Register(){
        $response = $this->dbConnect->execute("INSERT INTO UserTable (NameSurname, Email, Password) VALUES ('Onur Celik', 'onurcelik@outlook.com', 'milaslı48')");
        return $response;
    }

    public function Login(){
        $response = $this->dbConnect->get("SELECT Id, NameSurname, Email FROM UserTable WHERE Email='onurcelik@outlook.com' AND Password='milaslı48'");

        $data = $response->fetch_assoc();
        $user = new AccountBO($data["Id"], $data["NameSurname"], $data["Email"]);
        return $user;
    }

}

?>