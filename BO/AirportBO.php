<?php

class AirportBO
{
    private $Id;
    private $Code;
    private $Name;
    private $City;

    public function __construct($Id, $Code, $Name, $City){
        $this->Id = $Id;
        $this->Code = $Code;
        $this->Name = $Name;
        $this->City = $City;
    }


    public function getId(){
        return $this->Id;
    }

    public function getCode(){
		return $this->Code;
	}

    public function getName(){
        return $this->Name;
    }

    public function getCity(){
        return $this->City;
    }
}

?>