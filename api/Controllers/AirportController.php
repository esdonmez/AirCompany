<?php

require_once("../Core/DBConnect.php");
require_once("Models/AirportModel.php");
require_once("Helpers/ApiController.php");
require_once("Helpers/LogHelper.php");

//[RoutePrefix("api/airports")]
class AirportController extends ApiController
{
    private $dbConnect;


    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }


    //[HttpGet]
    public function GetAirports(){
        try{
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

            LogHelper::Log("AirportTable", "show airports");
            echo json_encode($airports);
        } 
        
        catch(Exception $e){
            LogHelper::Log("AirportTable", $e);
        }  
    }
}