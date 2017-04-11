<?php

class PlaneBO
{
    private $Id;
    private $Name;
    private $Capacity;
    private $Status;
    private $RegistrationNumber;


    public function PlaneBO($Id, $Name, $Capacity, $Status, $RegistrationNumber){
        $this->Id = $Id;
        $this->Name = $Name;
        $this->Capacity = $Capacity;
        $this->Status = $Status;
        $this->RegistrationNumber = $RegistrationNumber;
    }


    public function getId(){
        return $this->Id;
    }

    public function getName(){
        return $this->Name;
    }

    public function getCapacity(){
        return $this->Capacity;
    }

    public function getStatus(){
        return $this->Status;
    }

    public function getRegistrationNumber(){
        return $this->RegistrationNumber;
    }
}

?>