<?php

require_once("../Core/DBConnect.php");
require_once("Helpers/ApiController.php");
require_once("Models/CheckinModel.php");
require_once("Models/ResultModel.php");
require_once("Helpers/SeatHelper.php");

//[RoutePrefix("api/checkins")]
class CheckinController extends ApiController
{
    private $dbConnect;


    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }


    //[HttpPost]
    public function AddCheckin($flightid, $pnr){
        $response = $this->dbConnect->execute("INSERT INTO CheckinTable (FlightId, PNR, Seat, IsChecked) VALUES ('$flightid', '$pnr', 'A0', '0')");

        $model = new ResultModel();
        if($response == true){
            $model->IsSuccess = true;
            $model->Message = "check is added.";
        } else{
            $model->IsSuccess = false;
            $model->Message = "check is not added.";
        }

        $requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this->setHttpHeaders($requestContentType, $statusCode);

		echo json_encode($model);
    }

    //[HttpPost]
    public function Checkin($pnr){
        $seat = SeatHelper::GetSeat();
        $response = $this->dbConnect->execute("UPDATE CheckinTable SET Seat='$seat', IsChecked='1' WHERE '$pnr'=PNR");

        $model = new CheckinModel();
        $model->Seat = $seat;
        $model->PNR = $pnr;

        $requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this->setHttpHeaders($requestContentType, $statusCode);

		echo json_encode($model);
    }
}