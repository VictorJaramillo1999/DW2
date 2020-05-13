<?php

/*Conexión a la base de datos */
class Database{

    public static function connect(){
    // $db = new mysqli('localhost','root','','ecommerce');

    //Base de datos remota (heroku);
      $db = new mysqli('us-cdbr-east-06.cleardb.net','b0a8dd73660ad8','7329d917','heroku_c3f9b5239fa339e');
     

       $db->query("SET NAMES 'utf8'");
      
       return $db;
    }
}

?>