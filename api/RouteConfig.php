<?php

require_once("Controllers/AirportController.php");	
require_once("Controllers/CheckinController.php");	
require_once("Controllers/FlightController.php");

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

?>