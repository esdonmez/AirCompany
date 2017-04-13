<?php

require_once("../BO/PlaneBO.php");
require_once("Core/DBConnect.php");

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
            $model = new PlaneBO($data["Id"], $data["Name"], $data["Capacity"], $data["Status"], $data["RegistrationNumber"]);
            array_push($planes, $model);
        }

        return $planes;
    }

    public function GetPlanesCount(){
        $response = $this->dbConnect->get("SELECT COUNT(Id) AS size FROM PlaneTable");
        $data = $response->fetch_assoc();
        return $data["size"];
    }

    public function AddPlane($model){
        $response = $this->dbConnect->execute("INSERT INTO PlaneTable (Name, RegistrationNumber, Status) VALUES ($model->getName(), $model->getRegistrationNumber(), $model->getStatus())");
        return $response;
    }

    public function UpdatePlane($model){
        $response = $this->dbConnect->execute("UPDATE PlaneTable SET Name=$model->getName(), RegistrationNumber=$model->getRegistrationNumber(), Status=$model->getStatus() WHERE Id=$model->getId()");
        return $response;
    }

    public function DeletePlane($id){
        $response = $this->dbConnect->execute("DELETE FROM PlaneTable WHERE Id=$id");
        return $response;
    }
}

?>