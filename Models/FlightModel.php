<?php

class FlightModel
{
    private $Id;
    private $FlightNumber;
    private $PlaneId;
    private $DepartureId;
    private $DestinationId;
    private $DepartureDateTime;
    private $ArrivalDateTime;
    private $Price;
    private $Gate;
    private $IsActive;


    public function __construct($Id, $FlightNumber, $PlaneId, $DepartureId, $DestinationId, $DepartureDateTime, $ArrivalDateTime, $Price, $Gate, $IsActive){
        $this->Id = $Id;
        $this->FlightNumber = $FlightNumber;
        $this->PlaneId = $PlaneId;
        $this->DepartureId = $DepartureId;
        $this->DestinationId = $DestinationId;
        $this->DepartureDateTime = $DepartureDateTime;
        $this->ArrivalDateTime = $ArrivalDateTime;
        $this->Price = $Price;
        $this->Gate = $Gate;
        $this->IsActive = $IsActive;
    }


    public function getId(){
		return $this->Id;
	}

    public function getFlightNumber(){
        return $this->FlightNumber;
    }

    public function getPlaneId(){
        return $this->PlaneId;
    }

    public function getDepartureId(){
        return $this->DepartureId;
    }

    public function getDestinationId(){
        return $this->DestinationId;
    }

    public function getDepartureDateTime(){
        return $this->DepartureDateTime;
    }

    public function getArrivalDateTime(){
        return $this->ArrivalDateTime;
    }

    public function getPrice(){
        return $this->Price;
    }

    public function getGate(){
        return $this->Gate;
    }

    public function getIsActive(){
        return $this->IsActive;
    }
}

?>