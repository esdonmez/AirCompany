<?php

require_once("../Core/DBConnect.php");
require_once("Models/AirportModel.php");
require_once("Helpers/ApiController.php");

// [RoutePrefix("api/airports")]
class AirportController extends ApiController
{
    private $dbConnect;


    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }


    // [HttpGet]
    // [Route("")]
    public function GetAirports(){
        $response = $this->dbConnect->get("SELECT Id, Name, City FROM AirportTable");
        $airports = array();
        
        while($data = $response->fetch_assoc()) 
        {
            $model = new AirportModel();
            $model->Id = $data["Id"];
            $model->Name = $data["Name"];
            $model->City = $data["City"];

            array_push($airports, $model);
        }

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this->setHttpHeaders($requestContentType, $statusCode);

		echo json_encode($airports);
    }
}

?>