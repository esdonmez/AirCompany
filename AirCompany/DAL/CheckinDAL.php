<?php

require_once("../BO/CheckinBO.php");
require_once("Core/DBConnect.php");

class CheckinDAL
{
    private $dbConnect;


    public function CheckinDAL()
    {
        $this->dbConnect = new DBConnect();
    }


    public function GetCheckins(){
        $response = $this->dbConnect->get("SELECT CheckId, FlightId, PNR, Seat, IsChecked FROM CheckinTable");
        $checkins = array();

        while($data = $response->fetch_assoc()){
            $model = new CheckinBO($data["CheckId"], $data["FlightId"], $data["PNR"], $data["Seat"], $data["IsChecked"]);
            array_push($checkins, $model);
        }
        
        return $checkins;
    }

    public function GetCheckinsCount(){
        $response = $this->dbConnect->get("SELECT COUNT(CheckId) AS size FROM CheckinTable");
        $data = $response->fetch_assoc();
        return $data["size"];
    }

    public function AddCheckin($model){
        $response = $this->dbConnect->execute("INSERT INTO CheckinTable (FlightId, PNR, Seat, IsChecked) VALUES ($model->getFlightId(), $model->getPNR(), $model->getSeat(), $model->getIsChecked())");
        return $response;
    }

    public function UpdateCheckin($model){
        $response = $this->dbConnect->execute("UPDATE CheckinTable SET FlightId=$model->getFlightId(), PNR=$model->getPNR(), Seat=$model->getSeat(), IsChecked=$model->getIsChecked() WHERE CheckId=$model->getCheckId()");
        return $response;
    }

    public function DeleteCheckin($CheckId){
        $response = $this->dbConnect->execute("DELETE FROM CheckinTable WHERE CheckId=$CheckId");
        return $response;
    }
}

?>