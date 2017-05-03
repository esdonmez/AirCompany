<?php

require_once("Controller/AirportController.php");	
require_once("Controller/CheckinController.php");	

switch($_GET["view"])
{
	case "all":
		$controller = new AirportController();
		$controller->GetAirports();
		break;
		
	case "single":
		$controller = new AirportController();
		//$mobileRestHandler->getMobile($_GET["id"]);
		break;

	case "" :
		//404 - not found;
		break;
}

?>