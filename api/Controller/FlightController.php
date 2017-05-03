<?php

require_once("../Core/DBConnect.php");
require_once("Models/FlightModel.php");
require_once("Helpers/ApiController.php");

// [RoutePrefix("api/flights")]
class FlightController extends ApiController
{
    private $dbConnect;


    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }

    // [PostGet]
    // [Route("")]
    public function GetFlights(){

    }
}

?>