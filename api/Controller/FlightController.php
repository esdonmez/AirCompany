<?php

require_once("../Core/DBConnect.php");
require_once("Models/FlightModel.php");
require_once("Helpers/ApiController.php");

class FlightController extends ApiController
{
    private $dbConnect;


    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }

}

?>