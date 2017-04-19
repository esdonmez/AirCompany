<?php

require_once("../BO/PlaneBO.php");
require_once("Core/DBConnect.php");

class PlaneDAL
{
    private $dbConnect;


    public function __construct()
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
        $name = $model->getName();
        $registrationnumber = $model->getRegistrationNumber();
        $status = $model->getStatus();

        $response = $this->dbConnect->execute("INSERT INTO PlaneTable (Name, RegistrationNumber, Status) VALUES ('$name', '$registrationnumber', '$status')");
        return $response;
    }

    public function UpdatePlane($model){
        $id = $model->getId();
        $name = $model->getName();
        $registrationnumber = $model->getRegistrationNumber();
        $status = $model->getStatus();

        $response = $this->dbConnect->execute("UPDATE PlaneTable SET Name='$name', RegistrationNumber='$registrationnumber', Status='$status' WHERE Id='$id");
        return $response;
    }

    public function DeletePlane($id){
        $response = $this->dbConnect->execute("DELETE FROM PlaneTable WHERE Id=$id");
        return $response;
    }
}

?>