
<?php
include_once 'medico.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/codigo/entidades/datos_medics.php';

class datosmedicos extends medicos{

public function cargar(){

$naci=(empty($_POST["born"])) ? NULL : $_POST["born"];
$especialidad=(empty($_POST["especiality"])) ? NULL : $_POST["especiality"];
$telefono=(empty($_POST["Phone"])) ? NULL : $_POST["Phone"];

session_start();
  require_once 'SQL.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/codigo/conn.php';
  $conn = new conn();
  $con=$conn->conectar();
  echo $_SESSION['name'];
  $this->setUser($_SESSION['name']);
  if($naci &&  $especialidad && $telefono){
      echo $this->get_Id();
      $values=$this->get_Id().",'$naci','$especialidad','$telefono'";
      $objsql= new metodosSQL();
      $que="INSERT INTO datos_medics (fk_medico,fecha_naci,especialidad,telefono)  VALUES (".$values.");";
   
      $objsql->insertar($con,$que);
      header('location:../tabla_medicamentos.php');
   }
}
}
$med= new datosmedicos();
$med->cargar();
?>