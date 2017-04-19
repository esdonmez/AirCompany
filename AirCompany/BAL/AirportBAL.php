<?php

include("../DAL/AirportDAL.php");

class AirportBAL
{
    private $airportDal;


    public function __construct()
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

    public function AddAirport($model){
        $response = $this->airportDal->AddAirport($model);
    }

    public function UpdateAirport($model){
        $resposne = $this->airportDal->UpdateAirport($model);
    }

    public function DeleteAirport($id){
        $response = $this->airportDal->DeleteAirport($id);
    }
}

?>