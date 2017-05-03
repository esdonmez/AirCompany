<?php

require_once("../Core/DBConnect.php");
require_once("Models/CheckinModel.php");
require_once("Helpers/ApiController.php");

class CheckinController extends ApiController
{
    private $dbConnect;


    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }

}

?>