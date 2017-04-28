<?php

include("Config.php");

class DBConnect
{
    private $connection;
	private $_host = SERVER;
	private $_username = USERNAME;
	private $_password = PASSWORD;
	private $_database = DBNAME;

    
    public function __construct() {
		$this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);

		if ($this->connection->connect_error) {
			die("connection error : " . $this->connection->connect_error);
		}

		$this->connection->set_charset("utf8");
	}

    public function __destruct(){
         $this->connection->close();
    }


    public function get($sql){   
        $result = $this->connection->query($sql);
        return $result;
    }

    public function execute($sql){
        return ($this->connection->query($sql) == TRUE);
    }
}