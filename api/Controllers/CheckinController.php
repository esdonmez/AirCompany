<?php

require_once("../Core/DBConnect.php");
require_once("Helpers/ApiController.php");
require_once("Models/CheckinModel.php");

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
        $response = $this->dbConnect->execute("INSERT INTO CheckinTable (FlightId, PNR, Seat, IsChecked) VALUES ('$flightid', '$pnr', 'A0', '0')");

        $requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this->setHttpHeaders($requestContentType, $statusCode);

		echo json_encode($response);
    }

    // [HttpPost]
    // [Route("")]
    public function Checkin($pnr){
        $seat = "A10"; //write to define seat alg.
        $response = $this->dbConnect->execute("UPDATE CheckinTable SET Seat='$seat', IsChecked='1' WHERE '$pnr'=PNR");

        $model = new CheckinModel();
        $model->Seat = $seat;
        $model->PNR = $pnr;

        $requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this->setHttpHeaders($requestContentType, $statusCode);

		echo json_encode($model);
    }
}