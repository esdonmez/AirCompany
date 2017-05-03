<?php

require_once("../Core/DBConnect.php");
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
    public function AddCheckin($flightid, $pnr){
        $flightid = $flightid;
        $pnr = $pnr;
        $seat = "A0";
        $ischecked = "0";

        $response = $this->dbConnect->execute("INSERT INTO CheckinTable (FlightId, PNR, Seat, IsChecked) VALUES ('$flightid', '$pnr', '$seat', '$ischecked')");
        header('Content-Type: application/json');
        $requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this->setHttpHeaders($requestContentType, $statusCode);

		echo json_encode($response);
    }

    // [HttpPost]
    // [Route("")]
    public function Checkin(){

    }
}