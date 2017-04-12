<?php

include("../BO/AirportBO.php");
include("Core/DBConnect.php");

class AirportDAL
{
    private $dbConnect;


    public function AirportDAL()
    {
        $this->dbConnect = new DBConnect();
        $this->GetAirportsCount();
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

    public function GetAirportsCount(){
        $response = $this->dbConnect->get("SELECT COUNT(Id) AS size FROM AirportTable");
        $data = $response->fetch_assoc();
        return $data["size"];
    }
    
    public function AddAirport(){
        $response = $this->dbConnect->execute("INSERT INTO AirportTable (Code, Name, City) VALUES ('48', 'Bodrum-Milas', 'Muğla')");
        return $response;
    }

    public function UpdateAirport(){
        $response = $this->dbConnect->execute("UPDATE AirportTable SET Name='Bodrum-Milas' WHERE Code='48'");
        return $response;
    }

    public function DeleteAirport(){
        $response = $this->dbConnect->execute("DELETE FROM AirportTable WHERE Code='48'");
        return $response;
    }
}

?>