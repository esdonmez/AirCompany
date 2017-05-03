<?php

require_once("../Core/DBConnect.php");
require_once("Models/CheckinModel.php");
require_once("Helpers/ApiController.php");

// [RoutePrefix("api/checkins")]
class CheckinController extends ApiController
{
    private $dbConnect;


    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }


    // [HttpPost]
    // [Route("")]
    public function AddCheckin(){

    }

    // [HttpPost]
    // [Route("")]
    public function Checkin(){

    }
}