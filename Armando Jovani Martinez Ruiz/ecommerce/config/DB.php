<?php

/*Conexión a la base de datos */
class Database{

    public static function connect(){
       $db = new mysqli('localhost','root','','ecommerce');
       $db->query("SET NAMES 'utf8'");

       return $db;
    }
}

?>