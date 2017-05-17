<?php

require_once("../Core/DBConnect.php");
require_once("Models/LoggingModel.php");
require_once("Helpers/ApiController.php");

class LoggingController extends ApiController
{
    private $dbConnect;


    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }


    public function GetLogs(){
        $response = $this->dbConnect->get("SELECT Id, Entity, Operation, CreateDate FROM LoggingTable");
        $logs = array();

        while($data = $response->fetch_assoc()) {
            $model = new LoggingModel($data["Id"], $data["Entity"], $data["Operation"], $data["CreateDate"]);
            array_push($logs, $model);
        }

        return $logs;
    }

    public static function Log($entity, $operation){
        $dt = new DateTime();
        $createdate = $dt->format('Y-m-d H:i:s');
        
        $dbConnect = new DBConnect();
        $response = $dbConnect->execute("INSERT INTO LoggingTable (Entity, Operation, CreateDate) VALUES ('$entity', '$operation', '$createdate')");

        return $response;
    }
}