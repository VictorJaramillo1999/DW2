<?php
// Connection variables
$dbhost	= "localhost";	   // localhost or IP
$dbuser	= "root";		  // database username
$dbpass	= "";		     // database password
$dbname	= "medifast";    // database name
class conn{

private $dbhost	= "localhost";	   // localhost or IP
private $dbuser	= "root";		  // database username
private $dbpass	= "";		     // database password
private $dbname	= "medifast";  

    public function conectar(){
        return $conn = mysqli_connect($this->dbhost,$this->dbuser, $this->dbpass,$this->dbname);
    }

}



?>