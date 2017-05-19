<?php

require_once("Controllers/AirportController.php");	
require_once("Controllers/CheckinController.php");	
require_once("Controllers/FlightController.php");

$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
	{
		case 'GET':
			if($_GET["view"] == "airports"){
				$controller = new AirportController();
				$controller->GetAirports();
			}

		case 'POST':
			if($_GET["view"] == "checkins" && isset($_POST["FlightId"]) && isset($_POST["PNR"])){
				$controller = new CheckinController();
				$controller->AddCheckin($_POST["FlightId"], $_POST["PNR"]);
			}

			if($_GET["view"] == "checkins" && !isset($_POST["FlightId"]) && isset($_POST["PNR"])){
				$controller = new CheckinController();
				$controller->Checkin($_POST["PNR"]);
			}
			
			if($_GET["view"] == "flights" && isset($_POST["DepartureAirportCode"]) && isset($_POST["DepartureDateTime"]) && isset($_POST["ArrivalAirportCode"])){
				$controller = new FlightController();
				$controller->GetFlights($_POST["DepartureAirportCode"], $_POST["DepartureDateTime"], $_POST["ArrivalAirportCode"]);
			}

			break;

		default:
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}