<?php

class MySQLConfig{
    
    private $conn = null;
    
    public function __construct($servername, $username, $password, $dbname){
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        //$this->conn = mysqli_connect($servername, $username, $password, $dbname);
    }
    
    public function __destruct(){
        $this->conn->close();
    }
    
    public  function getConnection(){
        if (!$this->conn->connect_error) {
            return $this->conn;
        }
        return null;
    }  
    
}

?>