<?php

include("DBConfig.php");

class DBConnect
{
    private static $_instance;
    private $connection;
	private $_host = "localhost";
	private $_username = "root";
	private $_password = "2255";
	private $_database = "AirCompanyDB";

    
    public function DBConnect() {
		$this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);

		if ($this->connection->connect_error) {
			die("Bağlantı hatası: " . $this->connection->connect_error);
		}

		$this->connection->set_charset("utf8");
	}

    public function __destruct(){
         $this->connection->close();
    }


    public static function getInstance() {
		if(!self::$_instance) {
			self::$_instance = new self();
		}
        
		return self::$_instance;
	}

    public function get($sql){   
        $result = $this->connection->query($sql);
        return $result;
    }

    public function execute($sql){
        return ($this->connection->query($sql) == TRUE);
    }
}