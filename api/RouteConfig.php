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
			$controller->AddCheckin($_POST["FlightId"], $_POST["PNR"]);
			break;
		case 'PUT':
			// Update Product
			$product_id=intval($_GET["product_id"]);
			update_product($product_id);
			break;
		case 'DELETE':
			// Delete Product
			$product_id=intval($_GET["product_id"]);
			delete_product($product_id);
			break;
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}
