<?php

class AirportBO
{
    private $Code;
    private $Name;
    private $City;

    public function AirportBO($Code, $Name, $City){
        $this->Code = $Code;
        $this->Name = $Name;
        $this->City = $City;
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