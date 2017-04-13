<?php

include("../DAL/AirportDAL.php");

class AirportBAL
{
    private $airportDal;


    public function AirportBAL()
    {
        $this->airportDal = new AirportDAL();
    }


    public function GetAirports(){
        return $this->airportDal->GetAirports();
    }

    public function GetAirport($id){
        return $this->airportDal->GetAirport($id);
    }

    public function GetAirportsCount(){
        return $this->airportDal->GetAirportsCount();
    }

    public function AddAirport(){
        $response = $this->airportDal->AddAirport();
    }

    public function UpdateAirport(){
        $resposne = $this->airportDal->UpdateAirport();
    }

    public function DeleteAirport($id){
        $response = $this->airportDal->DeleteAirport($id);
    }
}

?>