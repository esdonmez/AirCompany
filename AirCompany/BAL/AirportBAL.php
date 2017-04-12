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

    public function GetAirportsCount(){
        return $this->airportDal->GetAirportsCount();
    }
}

?>