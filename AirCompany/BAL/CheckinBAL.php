<?php

include("../DAL/CheckinDAL.php");

class CheckinBAL
{
    private $checkinDal;


    public function CheckinBAL()
    {
        $this->checkinDal = new CheckinDAL();
    }


    public function GetCheckins(){
        return $this->checkinDal->GetCheckins();
    }

    public function GetCheckinsCount(){
        return $this->checkinDal->GetCheckinsCount();
    }

    public function AddCheckin(){
        $response = $this->checkinDal->AddCheckin();
    }

    public function UpdateCheckin(){
        $resposne = $this->checkinDal->UpdateCheckin();
    }

    public function DeleteCheckin($CheckId){
        $response = $this->checkinDal->DeleteCheckin($CheckId);
    }

}

?>