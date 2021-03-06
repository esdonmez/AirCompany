<?php

require_once("Core/DBConnect.php");
require_once("Models/CheckinModel.php");

class CheckinController
{
    private $dbConnect;
    

    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }


    public function GetCheckins(){
        $response = $this->dbConnect->get("SELECT CheckId, FlightId, PNR, Seat, IsChecked FROM CheckinTable");
        $checkins = array();

        while($data = $response->fetch_assoc()){
            $model = new CheckinModel($data["CheckId"], $data["FlightId"], $data["PNR"], $data["Seat"], $data["IsChecked"]);
            array_push($checkins, $model);
        }
        
        return $checkins;
    }

    public function GetCheckin($id){
        $response = $this->dbConnect->get("SELECT CheckId, FlightId, PNR, Seat, IsChecked FROM CheckinTable WHERE CheckId=$id");
        
        $data = $response->fetch_assoc();
        $model = new CheckinModel($data["CheckId"], $data["FlightId"], $data["PNR"], $data["Seat"], $data["IsChecked"]);

        return $model;
    }

    public function GetCheckinsCount(){
        $response = $this->dbConnect->get("SELECT COUNT(CheckId) AS size FROM CheckinTable");
        $data = $response->fetch_assoc();
        return $data["size"];
    }

    public function AddCheckin($model){
        $flightid = $model->getFlightId();
        $pnr = $model->getPNR();
        $seat = $model->getSeat();
        $ischecked = $model->getIsChecked();

        $response = $this->dbConnect->execute("INSERT INTO CheckinTable (FlightId, PNR, Seat, IsChecked) VALUES ('$flightid', '$pnr', '$seat', '$ischecked')");
        return $response;
    }

    public function UpdateCheckin($model){
        $checkid = $model->getCheckId();
        $flightid = $model->getFlightId();
        $pnr = $model->getPNR();
        $seat = $model->getSeat();
        $ischecked = $model->getIsChecked();
        
        $response = $this->dbConnect->execute("UPDATE CheckinTable SET FlightId=$flightid, PNR='$pnr', Seat='$seat', IsChecked='$ischecked' WHERE CheckId='$checkid'");
        return $response;
    }

    public function DeleteCheckin($checkId){
        $response = $this->dbConnect->execute("DELETE FROM CheckinTable WHERE CheckId=$checkId");
        return $response;
    }
}