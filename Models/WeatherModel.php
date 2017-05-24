<?php

class WeatherModel
{
    private $DepartureCity;
    private $DepartureDate;
    private $ArrivalCity;
    private $ArrivalDate;
    private $Departure_Weather;
    private $Arrival_Weather;


    public function __construct($DepartureCity, $DepartureDate, $ArrivalCity, $ArrivalDate, $Departure_Weather, $Arrival_Weather){
        $this->DepartureCity = $DepartureCity;
        $this->DepartureDate = $DepartureDate;
        $this->ArrivalCity = $ArrivalCity;
        $this->ArrivalDate = $ArrivalDate;
        $this->Departure_Weather = $Departure_Weather;
        $this->Arrival_Weather = $Arrival_Weather;
    }


    public function getDepartureCity(){
		return $this->DepartureCity;
	}

    public function getDepartureArrivalDate(){
        return $this->DepartureDate;
    }

    public function getArrivalCity(){
        return $this->ArrivalCity;
    }

    public function getArrivalDate(){
        return $this->ArrivalDate;
    }

    public function getGate(){
        return $this->Departure_Weather;
    }

    public function Arrival_Weather(){
        return $this->Arrival_Weather;
    }
}