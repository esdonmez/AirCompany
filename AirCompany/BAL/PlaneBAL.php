<?php

include("../DAL/PlaneDAL.php");

class PlaneBAL
{
    private $planeDal;


    public function PlaneBAL()
    {
        $this->planeDal = new PlaneDAL();
    }


    public function GetPlanesCount(){
        return $this->planeDal->GetPlanesCount();
    }

}

?>