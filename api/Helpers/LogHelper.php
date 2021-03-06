<?php

require_once("../Core/DBConnect.php");
require_once("Models/LoggingModel.php");

class LogHelper
{
    public static function Log($entity, $operation, $isSuccess){
        $dt = new DateTime();
        $createdate = $dt->format('Y-m-d H:i:s');
        
        $ip = $_SERVER['REMOTE_ADDR'];

        $dbConnect = new DBConnect();
        $response = $dbConnect->execute("INSERT INTO LoggingTable (CreateDate, IpAddress, Entity, Operation, IsSuccess) VALUES ('$createdate', '$ip', '$entity', '$operation', '$isSuccess')");

        return $response;
    }
}