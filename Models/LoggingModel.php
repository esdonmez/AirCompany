<?php

class LoggingModel
{
    private $Id;
    private $Entity;
    private $Operation;
    private $CreateDate;


    public function __construct($Id, $Entity, $Operation, $CreateDate)
    {
        $this->Id = $Id;
        $this->Entity = $Entity;
        $this->Operation = $Operation;
        $this->CreateDate = $CreateDate;
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
}

?>