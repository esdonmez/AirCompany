<?php

require_once("DAL/DBConnect.php");
require_once("BO/AirportBO.php");

class AirportBAL
{
    private $dbConnect;
    

    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }


    public function GetAirports(){
        $response = $this->dbConnect->get("SELECT Id, Code, Name, City FROM AirportTable");
        $airports = array();

        while($data = $response->fetch_assoc()) {
            $model = new AirportBO($data["Id"], $data["Code"], $data["Name"], $data["City"]);
            array_push($airports, $model);
        }

        return $airports;
    }

    public function GetAirport($id){
        $response = $this->dbConnect->get("SELECT Id, Code, Name, City FROM AirportTable WHERE Id=$id");

        $data = $response->fetch_assoc();
        $model = new AirportBO($data["Id"], $data["Code"], $data["Name"], $data["City"]);

        return $model;
    }

    public function GetAirportsCount(){
        $response = $this->dbConnect->get("SELECT COUNT(Id) AS size FROM AirportTable");
        $data = $response->fetch_assoc();
        return $data["size"];
    }

    public function AddAirport($model){
        $code = $model->getCode();
        $name = $model->getName();
        $city = $model->getCity();

        $response = $this->dbConnect->execute("INSERT INTO AirportTable (Code, Name, City) VALUES ('$code', '$name', '$city')");
        return $response;
    }

    public function UpdateAirport($model){
        $id = $model->getId();
        $code = $model->getCode();
        $name = $model->getName();
        $city = $model->getCity();

        $response = $this->dbConnect->execute("UPDATE AirportTable SET Code='$code', Name='$name', City='$city' WHERE Id=$id");
        return $response;
    }

    public function DeleteAirport($id){
        $response = $this->dbConnect->execute("DELETE FROM AirportTable WHERE Id=$id");
        return $response;
    }
}

?>