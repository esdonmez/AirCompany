<?php

include("../DAL/CheckinDAL.php");

class CheckinBAL
{
    private $checkinDal;


    public function __construct()
    {
        $this->checkinDal = new CheckinDAL();
    }


    public function GetCheckins(){
        return $this->checkinDal->GetCheckins();
    }

    public function GetCheckinsCount(){
        return $this->checkinDal->GetCheckinsCount();
    }

    public function AddCheckin($model){
        $response = $this->checkinDal->AddCheckin($model);
    }

    public function UpdateCheckin($model){
        $resposne = $this->checkinDal->UpdateCheckin($model);
    }

    public function DeleteCheckin($CheckId){
        $response = $this->checkinDal->DeleteCheckin($CheckId);
    }
}

?>