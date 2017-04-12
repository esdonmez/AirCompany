<?php

include("../DAL/FlightDAL.php");

class FlightBAL
{
    private $flightDal;


    public function FlightBAL()
    {
        $this->flightDal = new FlightDAL();
    }

    public function GetFlights(){
        return $this->flightDal->GetFlights();
    }

    public function GetFlightsCount(){
        return $this->flightDal->GetFlightsCount();
    }

    public function AddFlight(){
        $response = $this->flightDal->AddFlight();
    }

    public function UpdateFlight(){
        $resposne = $this->flightDal->UpdateFlight();
    }

    public function DeleteFlight(){
        $response = $this->flightDal->DeleteFlight();
    }
}

?>