<?php

require_once("../Core/DBConnect.php");
require_once("Models/FlightModel.php");
require_once("Models/FlightInfoModel.php");
require_once("Helpers/ApiController.php");
require_once("Helpers/LogHelper.php");

//[RoutePrefix("api/flights")]
class FlightController extends ApiController
{
    private $dbConnect;


    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }


    //[HttpPost]
    public function GetFlights($DepartureAirportCode, $DepartureDateTime, $ArrivalAirportCode){
        $response = $this->dbConnect->get("SELECT F.Id, F.FlightNumber, F.Gate, F.Price, F.DepartureDateTime, F.ArrivalDateTime,
                                            A1.City as DepartureCity, A1.Code as DepartureAirportCode,
                                            A2.City as ArrivalCity, A2.Code as ArrivalAirportCode
                                            FROM FlightTable AS F LEFT JOIN AirportTable AS A1 ON F.DepartureId = A1.Id LEFT JOIN AirportTable AS A2 ON F.DestinationId = A2.Id
                                            WHERE '$DepartureAirportCode' = A1.Code AND '$ArrivalAirportCode' = A2.Code AND 
                                                    Date(F.DepartureDateTime) = '$DepartureDateTime'");

        $flights = array();
        $model = new FlightInfoModel();
        
        while($data = $response->fetch_assoc()) 
        {
            $model->DepartureCity = $data["DepartureCity"];
            $model->DepartureAirportCode = $data["DepartureAirportCode"];
            $model->ArrivalCity = $data["ArrivalCity"];
            $model->ArrivalAirportCode = $data["ArrivalAirportCode"];
            
            $flight = new FlightModel();  
            $flight->Id = $data["Id"];
            $flight->FlightNumber = $data["FlightNumber"];
            $flight->DepartureDateTime = $data["DepartureDateTime"];     
            $flight->ArrivalDateTime = $data["ArrivalDateTime"];
            $flight->Price = $data["Price"];
            
            array_push($flights, $flight);
        }

        $model->Flights = $flights;

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this->setHttpHeaders($requestContentType, $statusCode);
        
        LogHelper::Log("FlightTable", "show flights");
		echo json_encode($model);
    }
}