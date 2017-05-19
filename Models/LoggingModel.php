<?php

class LoggingModel
{
    private $Id;
    private $Entity;
    private $Operation;
    private $CreateDate;
    private $IpAddress;
    private $IsSuccess;


    public function __construct($Id, $Entity, $Operation, $CreateDate, $IpAddress, $IsSuccess)
    {
        $this->Id = $Id;
        $this->Entity = $Entity;
        $this->Operation = $Operation;
        $this->CreateDate = $CreateDate;
        $this->IpAddress = $IpAddress;
        $this->IsSuccess = $IsSuccess;
    }


    public function getId(){
        return $this->Id;
    }

    public function getEntity(){
        return $this->Entity;
    }

    public function getOperation(){
        return $this->Operation;
    }

    public function getCreateDate(){
        return $this->CreateDate;
    }

    public function getIpAddress(){
        return $this->IpAddress;
    }

    public function getIsSuccess(){
        return $this->IsSuccess;
    }
}