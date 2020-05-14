<?php

class Utils{

   //Comprueba si el usuario es admin
   public static function isAdmin(){
      if(!isset($_SESSION['admin'])){
         header('Location:'.base_url);
         ob_end_flush();
      }else{
           return true;
      }
   }

   //Cierra las alertas (éxito y error)
   public static function alertaClose(){
       if(isset($_SESSION['confirmado']) || isset($_SESSION['error'])){
           unset($_SESSION['confirmado']);
           unset($_SESSION['error']);
       }
   }

   //Estadisticas del carrito
   public static function statsCarrito(){
      $unidades=0;
      if(isset($_SESSION['carrito'])){
         foreach($_SESSION['carrito'] as $indice => $elemento){
           $unidades += $elemento['unidades'];
         }
      }

      return $unidades;
   }
}