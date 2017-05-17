<?php

require_once("../Core/DBConnect.php");
require_once("Helpers/ApiController.php");
require_once("Models/CheckinModel.php");
require_once("Models/ResultModel.php");
require_once("Helpers/SeatHelper.php");
require_once("Helpers/LogHelper.php");

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
        try{
            $response = $this->dbConnect->execute("INSERT INTO CheckinTable (FlightId, PNR, Seat, IsChecked) VALUES ('$flightid', '$pnr', 'A0', '0')");

            $model = new ResultModel();
            if($response == true){
                $model->IsSuccess = true;
                $model->Message = "check is added.";
                LogHelper::Log("CheckinTable", "add a checkin");
            } else{
                $model->IsSuccess = false;
                $model->Message = "check is not added.";
                LogHelper::Log("CheckinTable", "cannot add the checkin");
            }

            $requestContentType = $_SERVER['HTTP_ACCEPT'];
            $this->setHttpHeaders($requestContentType, $statusCode);

            echo json_encode($model);
        }

        catch(Exception $e){
            LogHelper::Log("CheckinTable", $e);
        }
    }

    //[HttpPost]
    public function Checkin($pnr){
        try{
            $seat;
            
            while(true){
                $seat = SeatHelper::GetSeat();
                $result = $this->dbConnect->get("SELECT count(*) as Count FROM CheckinTable WHERE Seat='$seat'");
                $data = $result->fetch_assoc();

                if($data["Count"] == 0){
                    break;
                }
            }

            $response = $this->dbConnect->execute("UPDATE CheckinTable SET Seat='$seat', IsChecked='1' WHERE '$pnr'=PNR");

            $model = new CheckinModel();
            $model->Seat = $seat;
            $model->PNR = $pnr;

            $requestContentType = $_SERVER['HTTP_ACCEPT'];
            $this->setHttpHeaders($requestContentType, $statusCode);

            LogHelper::Log("CheckinTable", "assign a seat");
            echo json_encode($model);
        }

        catch(Exception $e){
            LogHelper::Log("CheckinTable", $e);
        }    
    }
}