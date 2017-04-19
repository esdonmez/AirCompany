<?php

require_once("../BO/FlightBO.php");
require_once("Core/DBConnect.php");

class FlightDAL
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

    public function GetFlightsCount(){
        $response = $this->dbConnect->get("SELECT COUNT(Id) AS size FROM FlightTable");
        $data = $response->fetch_assoc();
        return $data["size"];
    }

    public function AddFlight(){
        $response = $this->dbConnect->execute("INSERT INTO FlightTable (FlightNumber, PlaneId, DepartureId, DestinationId, DepartureDateTime, ArrivalDateTime, Price, Gate, IsActive) VALUES ('AA9523', 1, 1, 3, '2011-01-01T15:03:01.012345Z', '2011-01-01T15:03:01.012345Z', 23.0, '236', 1, 1)");
        return $response;
    }

    public function UpdateFlight(){
        $response = $this->dbConnect->execute("UPDATE"); 
        return $response;
    }

    public function DeleteFlight($FlightNumber){
        $response = $this->dbConnect->execute("DELETE FROM FlightTable WHERE FlightNumber=$FlightNumber");
        return $response;
    }
}

?>