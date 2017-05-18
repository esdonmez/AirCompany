<?php

require_once("../Core/DBConnect.php");
require_once("Models/LoggingModel.php");

class LogHelper
{
    public static function Log($entity, $ip, $operation){
        $dt = new DateTime();
        $createdate = $dt->format('Y-m-d H:i:s');
        
        $dbConnect = new DBConnect();
        $response = $dbConnect->execute("INSERT INTO LoggingTable (Entity, Operation, IpAddress, CreateDate) VALUES ('$entity', '$ip', '$operation', '$createdate')");

        return $response;
    }
}