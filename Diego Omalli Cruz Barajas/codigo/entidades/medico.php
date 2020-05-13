<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/codigo/DB.php';

class medicos extends DB{
public $id;
public $nombres;
public $apellidos;
public $email;
public function get_Id(){
   return $this->id;
}
public function set_Id($id){
   $this->id = $id;
}
public function get_Apellidos(){
   return $this->apellidos;
}
public function set_Apellidos($apellidos){
   $this->apellidos = $apellidos;
}
public function get_nombres(){
   return $this->nombres;
}
public function set_nombres($nombre){
   $this->nombres = $nombre;
}
public function get_Email(){
   return $this->email;
}
public function set_Email($email){
   $this->email = $email;
}
public function setUser($emails){
      
   $query = $this->connect()->prepare('SELECT * FROM users WHERE email = :emails');
   $query->execute(['emails' => $emails]);

   foreach ($query as $currentUser) {
       $this->id=($currentUser['id']);
       $this->nombres=($currentUser['nombres']);
       $this->apellidos=$currentUser['apellidos'];
       $this->email = $currentUser['email'];

       $_SESSION['nombres']=$this->nombres." ".$this->apellidos;
       
   }
}


}



 ?>