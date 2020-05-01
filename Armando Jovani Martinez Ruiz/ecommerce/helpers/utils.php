<?php

class Utils{
   public static function isAdmin(){
      if(!isset($_SESSION['admin'])){
         header('Location:'.base_url);
         ob_end_flush();
      }else{
           return true;
      }
   }

   public static function alertaClose(){
       if(isset($_SESSION['confirmado']) || isset($_SESSION['error'])){
           unset($_SESSION['confirmado']);
           unset($_SESSION['error']);
       }
   }
}