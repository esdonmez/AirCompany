<?php

include("../BO/PlaneBO.php");
include("Core/DBConnect.php");

class PlaneDAL
{
    private $dbConnect;


    public function PlaneDAL()
    {
        $this->dbConnect = new DBConnect();
    }


    public function GetPlanes(){
        $response = $this->dbConnect->get("SELECT Id, Name, Capacity, RegistrationNumber, Status FROM PlaneTable");
        $planes = array();

        while($data = $response->fetch_assoc()) {
            $model = new PlaneBO($data["Id"], $data["Name"], $data["Capacity"], $data["RegistrationNumber"], $data["Status"]);
            array_push($planes, $model);
        }

<<<<<<< HEAD
        echo $planes[0]->getName();
=======
>>>>>>> b21652f880d9df0c0d3bdae43af0770d660122f2
        return $planes;
    }

    public function GetPlanesCount(){
        $response = $this->dbConnect->get("SELECT COUNT(Id) AS size FROM PlaneTable");
        $data = $response->fetch_assoc();
        return $data["size"];
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
        return $response;
    }
}

?>