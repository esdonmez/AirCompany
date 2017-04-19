<?php

include("../DAL/PlaneDAL.php");

class PlaneBAL
{
    private $planeDal;


    public function __construct()
    {
        $this->planeDal = new PlaneDAL();
    }


    public function GetPlanes(){
        return $this->planeDal->GetPlanes();
    }

    public function GetPlanesCount(){
        return $this->planeDal->GetPlanesCount();
    }

    public function Addplane($model){
        $response = $this->planeDal->AddPlane($model);
    }

    public function UpdatePlane($model){
        $resposne = $this->planeDal->UpdatePlane($model);
    }

    public function DeletePlane($id){
        $response = $this->planeDal->DeletePlane($id);
    }
}

?>  