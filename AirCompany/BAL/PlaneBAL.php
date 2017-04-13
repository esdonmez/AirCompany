<?php

include("../DAL/PlaneDAL.php");

class PlaneBAL
{
    private $planeDal;


    public function PlaneBAL()
    {
        $this->planeDal = new PlaneDAL();
    }


    public function GetPlanes(){
        return $this->planeDal->GetPlanes();
    }

    public function GetPlanesCount(){
        return $this->planeDal->GetPlanesCount();
    }

    public function Addplane(){
        $response = $this->planeDal->AddPlane();
    }

    public function UpdatePlane(){
        $resposne = $this->planeDal->UpdatePlane();
    }

    public function DeletePlane($id){
        $response = $this->planeDal->DeletePlane($id);
    }
}

?>  