<?php

include("BO/AirportBO.php");
include("Core/DBConnect.php");

class AirportDAL
{
    public $dbConnect;


    public function AirportDAL()
    {
        $this->dbConnect = new DBConnect();
        $this->GetAirports();
    }


    public function GetAirports(){
        $response = $this->dbConnect->get("SELECT Code, Name, City FROM AirportTable");
     
        $airports = array();
        while($data = $response->fetch_assoc()){
            $airport = new AirportBO();
            $airport->Code = $data["Code"];
            $airport->Name = $data["Name"];
            $airport->City = $data["City"];

            array_push($airports, $airport);
            echo"hello";
        }

        return $airports;
    }

    public function AddAirport(){
        $response = $this->dbConnect->exec("INSERT INTO AirportTable (Code, Name, City) VALUES ('48', 'Bodrum-Milas', 'Muğla')");
    }

    public function UpdateAirport(){

    }

    public function DeleteAirport(){

    }
}

?>