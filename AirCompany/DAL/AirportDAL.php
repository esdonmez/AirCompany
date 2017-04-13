<?php

require_once("../BO/AirportBO.php");
require_once("Core/DBConnect.php");

class AirportDAL
{
    private $dbConnect;


    public function AirportDAL()
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
        $response = $this->dbConnect->execute("INSERT INTO AirportTable (Code, Name, City) VALUES ($model->getCode(), $model->getName(), $model->getCity()");
        return $response;
    }

    public function UpdateAirport($model){
        $response = $this->dbConnect->execute("UPDATE AirportTable SET Code=$model->getCode(), Name=$model->getName(), City=$model->getCity()  WHERE Id=$model->getId()");
        return $response;
    }

    public function DeleteAirport($id){
        $response = $this->dbConnect->execute("DELETE FROM AirportTable WHERE Code=$id");
        return $response;
    }
}

?>