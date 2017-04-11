<?php

include("../BO/CheckinBO.php");
include("Core/DBConnect.php");

class CheckinDAL
{
    private $dbConnect;


    public function CheckinDAL()
    {
        $this->dbConnect = new DBConnect();
        $this->AddCheckin();
    }


    public function GetCheckins(){
        $response = $this->dbConnect->get("SELECT CheckId, FlightId, PNR, Seat, IsChecked");
        $checkins = array();

        while($data = $response->fetch_assoc()){
            $model = new CheckinBO($data["CheckId"], $data["FlightId"], $data["PNR"], $data["Seat"], $data["IsChecked"]);
            array_push($checkins, $model);
        }

        echo $checkins[0]->getPNR();

        return $checkins;
    }

    public function AddCheckin(){
        $response = $this->dbConnect->execute("INSERT INTO CheckinTable (FlightId, PNR, Seat) VALUES (1, 'L2PBSQ', '17F')");
        return $response;
    }

    public function UpdateCheckin(){
        $response = $this->dbConnect->execute("UPDATE CheckinTable SET Seat='21A'");
        return $response;
    }

    public function DeleteCheckin(){
        $response = $this->dbConnect->execute("DELETE FROM CheckinTable WHERE CheckId='1'");
        return $response;
    }
}

?>