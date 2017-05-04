<?php

require_once("../Core/DBConnect.php");
require_once("Models/FlightModel.php");
require_once("Helpers/ApiController.php");

// [RoutePrefix("api/flights")]
class FlightController extends ApiController
{
    private $dbConnect;


    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }


    // [PostGet]
    // [Route("")]
    public function GetFlights($DepartureAirportCode, $DepartureDateTime, $ArrivalAirportCode, $ArrivalDateTime){
        $response = $this->dbConnect->get("SELECT F.Id, F.FlightNumber, F.Gate, F.Price, F.DepartureDateTime, F.ArrivalDateTime,
                                            A1.City as DepartureCity, A1.Code as DepartureAirportCode,
                                            A2.City as ArrivalCity, A2.Code as ArrivalAirportCode
                                            FROM FlightTable AS F LEFT JOIN AirportTable AS A1 ON F.DepartureId = A1.Id LEFT JOIN AirportTable AS A2 ON F.DestinationId = A2.Id
                                            WHERE $DepartureAirportCode = A1.DepartureAirportCode AND $ArrivalAirportCode = A2.ArrivalAirportCode");
        $flights = array();
        
        while($data = $response->fetch_assoc()) 
        {
            $model = new FlightModel();
            $model->Id = $data["Id"];
            $model->FlightNumber = $data["FlightNumber"];
            $model->DepartureCity = $data["DepartureCity"];
            $model->DepartureDateTime = $data["DepartureDateTime"];
            $model->DepartureAirportCode = $data["DepartureAirportCode"];
            $model->ArrivalCity = $data["ArrivalCity"];
            $model->ArrivalAirportCode = $data["ArrivalAirportCode"];
            $model->ArrivalDateTime = $data["ArrivalDateTime"];
            $model->Price = $data["Price"];
            
            array_push($flights, $model);
        }

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this->setHttpHeaders($requestContentType, $statusCode);

		echo json_encode($flights);
    }
}