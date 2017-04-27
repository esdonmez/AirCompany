<?php

require_once("Core/DBConnect.php");
require_once("BO/FlightBO.php");

class FlightBAL
{
    private $dbConnect;


    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }


    public function GetFlights(){
        $response = $this->dbConnect->get("SELECT Id, FlightNumber, PlaneId, DepartureId, DestinationId, DepartureDateTime, ArrivalDateTime, Price, Gate, IsActive FROM FlightTable");
        $flights = array();

        while($data = $response->fetch_assoc()) {
            $model = new FlightBO($data["Id"], $data["FlightNumber"], $data["PlaneId"], $data["DepartureId"], $data["DestinationId"], $data["DepartureDateTime"], $data["ArrivalDateTime"], $data["Price"], $data["Gate"], $data["IsActive"]);
            array_push($flights, $model);
        }

        return $flights;
    }

    public function GetFlight($id){
        $response = $this->dbConnect->get("SELECT Id, FlightNumber, PlaneId, DepartureId, DestinationId, DepartureDateTime, ArrivalDateTime, Price, Gate, IsActive FROM FlightTable WHERE Id=$id");
        
        $data = $response->fetch_assoc();
        $model = new FlightBO($data["Id"], $data["FlightNumber"], $data["PlaneId"], $data["DepartureId"], $data["DestinationId"], $data["DepartureDateTime"], $data["ArrivalDateTime"], $data["Price"], $data["Gate"], $data["IsActive"]);

        return $model;
    }

    public function GetFlightsCount(){
        $response = $this->dbConnect->get("SELECT COUNT(Id) AS size FROM FlightTable");
        $data = $response->fetch_assoc();
        return $data["size"];
    }

    public function AddFlight($model){
        $flightnumber = $model->getFlightNumber();
        $planeid = $model->getPlaneId();
        $departureid = $model->getDepartureId();
        $destinationid = $model->getDestinationId();
        $departuredatetime = $model->getDepartureDateTime();
        $arrivaldatetime = $model->getArrivalDateTime();
        $price = $model->getPrice();
        $gate = $model->getGate();
        $isactive = $model->getIsActive();

        $response = $this->dbConnect->execute("INSERT INTO FlightTable (FlightNumber, PlaneId, DepartureId, DestinationId, DepartureDateTime, ArrivalDateTime, Price, Gate, IsActive) VALUES ('$flightnumber', '$planeid', '$departureid', '$destinationid', '$departuredatetime', '$arrivaldatetime', '$price', '$gate', '$isactive')");
        return $response;
    }

    public function UpdateFlight($model){
        $id = $model->getId();
        $flightnumber = $model->getFlightNumber();
        $planeid = $model->getPlaneId();
        $departureid = $model->getDepartureId();
        $destinationid = $model->getDestinationId();
        $departuredatetime = $model->getDepartureDateTime();
        $arrivaldatetime = $model->getArrivalDateTime();
        $price = $model->getPrice();
        $gate = $model->getGate();
        $isactive = $model->getIsActive();

        $response = $this->dbConnect->execute("UPDATE FlightTable SET FlightNumber='$flightnumber', PlaneId='$planeid', DepartureId='$departureid', DestinationId='$destinationid', DepartureDateTime='$departuredatetime', ArrivalDateTime='$arrivaldatetime', Price='$price', Gate='$gate', IsActive='$isactive' WHERE Id='$id'"); 
        return $response;
    }

    public function DeleteFlight($id){
        $response = $this->dbConnect->execute("DELETE FROM FlightTable WHERE Id=$id");
        return $response;
    }
}

?>