<?php

include("../BO/PlaneBO.php");
include("Core/DBConnect.php");

class PlaneDAL
{
    private $dbConnect;


    public function PlaneDAL()
    {
        $this->dbConnect = new DBConnect();
        $this->AddPlane();
    }


    public function GetPlanes(){
        $response = $this->dbConnect->get("SELECT Name, Capacity, RegistrationNumber, Status FROM PlaneTable");
        $planes = array();

        while($data = $response->fetch_assoc()) {
            $model = new PlaneBO($data["Id"], $data["Name"], $data["Capacity"], $data["RegistrationNumber"], $data["Status"]);
            array_push($planes, $model);
        }

        echo $planes[0]->getName();

        return $planes;
    }

    public function AddPlane(){
        $response = $this->dbConnect->execute("INSERT INTO PlaneTable (Name, RegistrationNumber, Status) VALUES ('Seray', '12345', 'ucusta')");
        return $response;
    }

    public function UpdatePlane(){
        $response = $this->dbConnect->execute("UPDATE PlaneTable SET Name='Elif' WHERE Id='1'");
        return response;
    }

    public function DeletePlane(){
        $response = $this->dbConnect->execute("DELETE FROM PlaneTable WHERE Id='1'");
        echo $response;
        return $response;
    }
}

?>