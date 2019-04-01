<?php

include('mysql.ini.php');

class Configuration{

  private  $servername = "db4free.net";
  //$host = "85.10.205.173:3306";
  private  $username = "humayoun";
  private  $password = "dotnetguy";
  private  $dbname = "dotnetguy";
  private $config = null;
  public function __construct(){
    $this->config = new MySQLConfig($this->servername
    ,$this->username
    ,$this->password
    ,$this->dbname);        
  }

  public function getConnection(){
      return $this->config->getConnection();
  }

}

?>