<?php

require_once("Controllers/AirportController.php");	
require_once("Controllers/CheckinController.php");	
require_once("Controllers/FlightController.php");

$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
	{
		case 'GET':
			switch($_GET["view"])
			{
				case "airports":
					$controller = new AirportController();
					$controller->GetAirports();
					break;
					
				case "single":
					$controller = new AirportController();
					//$mobileRestHandler->getMobile($_GET["id"]);
					break;

				case "flights":
					$controller = new FlightController();
					$controller->GetFlights();
					break;
			}
			break;

		case 'POST':
			$controller = new CheckinController();
			if(!isset($_POST["flightId"])){
				$controller->Checkin($_POST["pnr"]);
			} else{
				$controller->AddCheckin($_POST["flightId"], $_POST["pnr"]);
			}
			break;

		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}