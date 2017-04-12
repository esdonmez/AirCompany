<?php

class ResultModel
{
    private $IsSuccess;
    private $Message;


    public function ResultModel($IsSuccess, $Message)
    {
        $this->IsSuccess = $IsSuccess;
        $this->Message = $Message;
    }


    public function getIsSuccess(){
        return $this->IsSuccess;
    }

    public function getMessage(){
        return $this->Message;
    }
}

?>