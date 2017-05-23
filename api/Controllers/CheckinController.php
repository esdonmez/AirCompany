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
            $result = $this->dbConnect->get("SELECT count(*) as Count FROM CheckinTable WHERE PNR='$pnr' && FlightId='$flightid'");
            $data = $result->fetch_assoc();

            if($data["Count"] == 0){
                $response = $this->dbConnect->execute("INSERT INTO CheckinTable (FlightId, PNR, Seat, IsChecked) VALUES ('$flightid', '$pnr', 'A0', '0')");
                                
                $model = new ResultModel();
                if($response == true){
                    $passangerSizeQuery = $this->dbConnect->get("SELECT Passanger FROM FlightTable WHERE Id='$flightid'");
                    $passangerSizeData = $passangerSizeQuery->fetch_assoc();
                    $newSize = $passangerSizeData["Passanger"] + 1;
                    $updatePassangerSize = $this->dbConnect->execute("UPDATE FlightTable SET Passanger='$newSize' WHERE Id='$flightid'"); 

                    $model->IsSuccess = true;
                    $model->Message = "check is added.";
                    LogHelper::Log("CheckinTable", "add a checkin", "true");
                } else{
                    $model->IsSuccess = false;
                    $model->Message = "check is not added.";
                    LogHelper::Log("CheckinTable", "cannot add the checkin", "false");
                }

                $requestContentType = $_SERVER['HTTP_ACCEPT'];
                $this->setHttpHeaders($requestContentType, $statusCode);

                echo json_encode($model);
            } else{
                $model->IsSuccess = false;
                $model->Message = "already add the checkin.";
                $requestContentType = $_SERVER['HTTP_ACCEPT'];
                $this->setHttpHeaders($requestContentType, $statusCode);

                echo json_encode($model);
                LogHelper::Log("CheckinTable", "already add the checkin", "false");
            }
        }

        catch(Exception $e){
            LogHelper::Log("CheckinTable", $e, "false");
        }
    }

    //[HttpPost]
    public function Checkin($pnr){
        try{
            $response = $this->dbConnect->get("SELECT IsChecked FROM CheckinTable WHERE '$pnr'=PNR");
            $data = $response->fetch_assoc();

            if($data["IsChecked"] == 0){
                $seat;
            
                while(true){
                    $seat = SeatHelper::GetSeat();
                    $result = $this->dbConnect->get("SELECT count(*) as Count FROM CheckinTable WHERE Seat='$seat'");
                    $data = $result->fetch_assoc();

                    if($data["Count"] == 0){
                        break;
                    }
                }

                $response1 = $this->dbConnect->execute("UPDATE CheckinTable SET Seat='$seat', IsChecked='1' WHERE '$pnr'=PNR");

                $model = new CheckinModel();
                $model->Seat = $seat;
                $model->PNR = $pnr;
                $model->IsSuccess = true;
                $model->Message = "checkin is complated";

                $requestContentType = $_SERVER['HTTP_ACCEPT'];
                $this->setHttpHeaders($requestContentType, $statusCode);

                LogHelper::Log("CheckinTable", "assign a seat", "true");
                echo json_encode($model);
            } else{
                $model = new CheckinModel();
                $model->Seat = null;
                $model->PNR = null;
                $model->IsSuccess = false;
                $model->Message = "already checked in";
                
                $requestContentType = $_SERVER['HTTP_ACCEPT'];
                $this->setHttpHeaders($requestContentType, $statusCode);

                LogHelper::Log("CheckinTable", "already checked in", "false");
                echo json_encode($model);
            }       
        }

        catch(Exception $e){
            LogHelper::Log("CheckinTable", $e, "false");
        }    
    }
}