<?php

include("../BO/FlightBO.php");
include("Core/DBConnect.php");

class FlightDAL
{
    private $dbConnect;


    public function FlightDAL()
    {
        $this->dbConnect = new DBConnect();
        $this->GetFlights();
    }


    public function GetFlights(){
        $response = $this->dbConnect->get("SELECT Id, FlightNumber, PlaneId, DepartureId, DestinationId, DepartureDateTime, ArrivalDateTime, Price, Gate, IsTwoWay, IsActive FROM FlightTable");
        $flights = array();

        while($data = $response->fetch_assoc()) {
            $model = new FlightBO($data["Id"], $data["FlightNumber"], $data["PlaneId"], $data["DepartureId"], $data["DestinationId"], $data["DepartureDateTime"], $data["ArrivalDateTime"], $data["Price"], $data["Gate"], $data["IsTwoWay"], $data["IsActive"]);
            array_push($flights, $model);
        }

        echo $flights[0]->getFlightNumber();

        return $flights;
    }

    public function AddFlight(){
        $response = $this->dbConnect->execute("INSERT INTO FlightTable (FlightNumber, PlaneId, DepartureId, DestinationId, DepartureDateTime, ArrivalDateTime, Price, Gate, IsTwoWay, IsActive) VALUES ('AA9523', 1, 1, 3, '2011-01-01T15:03:01.012345Z', '2011-01-01T15:03:01.012345Z', 23.0, '236', 1, 1)");
        return $response;
    }

    public function UpdateFlight(){
        $response = $this->dbConnect->execute("DELETE FROM FlightTable WHERE FlightNumber='AA9523'");
        return $response;
    }

    public function DeleteFlight(){
        $response = $this->dbConnect->execute("DELETE FROM FlightTable WHERE FlightNumber='AA9523'");
        return $response;
    }
}

?>