<?php

class CheckinModel
{
    private $CheckId;
    private $FlightId;
    private $PNR;
    private $Seat;
    private $IsChecked;

    public function __construct($CheckId, $FlightId, $PNR, $Seat, $IsChecked){
        $this->CheckId = $CheckId;
        $this->FlightId = $FlightId;
        $this->PNR = $PNR;
        $this->Seat = $Seat;
        $this->IsChecked = $IsChecked;
    }


    public function getCheckId(){
		return $this->CheckId;
	}

    public function getFlightId(){
        return $this->FlightId;
    }

    public function getPNR(){
        return $this->PNR;
    }

    public function getSeat(){
        return $this->Seat;
    }

    public function getIsChecked(){
        return $this->IsChecked;
    }
}