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
		$this->_connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);

		if(mysqli_connect_error()) {
			trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(), E_USER_ERROR);
		}
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
        $result = mysqli_query($connection, $sql);
        echo $sql;
        while($row = mysqli_fetch_assoc($result)) {
            echo "Name: " . $row["Name"];
        }
           
        echo"test";
        return $result;
    }

    public function execute($sql){
        return ($this->connection->query($sql) == TRUE);
    }
}