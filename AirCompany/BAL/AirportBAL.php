<?php

include("../DAL/AirportDAL.php");

class AirportBAL
{
    private $airportDal;


    public function AirportBAL()
    {
        $this->airportDal = new AirportDAL();
    }


    public function GetAirportsCount(){
        return $this->airportDal->GetAirportsCount();
    }

}

?>