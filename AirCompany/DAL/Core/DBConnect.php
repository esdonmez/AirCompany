<?php

include("Config.php");

class DBConnect
{   
    private $connection;


    public function __construct() {
        $this.connection = new mysqli(SERVER, USER, PASS, DBNAME);

        if ($this->connection->connect_error) {
	 			die("Error connection.: " . $this->connection->connect_error);
	 	}
        
	 	$this->connection->set_charset("utf8");
    }

    public function __destruct(){
         $this->connection->close();
    }


    public function get($query){
        $result = $this->connection->query($query);
        return $result;
    }

    public function execute($query){
        return ($this->connection->query($query) == TRUE);
    }
}