<?php

class LoggingBO
{
    private $Id;
    private $Table;
    private $Operation;
    private $CreateDate;


    public function LogBO($Id, $Table, $Operation, $CreateDate)
    {
        $this->Id = $Id;
        $this->Table = $Table;
        $this->Operation = $Operation;
        $this->CreateDate = $CreateDate;
    }


    public function getId(){
        return $this->Id;
    }

    public function getTable(){
        return $this->Table;
    }

    public function getOperation(){
        return $this->Operation;
    }

    public function getCreateDate(){
        return $this->CreateDate;
    }
}

?>