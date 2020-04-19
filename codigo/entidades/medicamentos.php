<?php
include_once 'medico.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/codigo/entidades/medicamentos.php';

class medicamentos extends medicos{
    

    public function cargar(){
        session_start();
    $nombre=(empty($_POST["nombre"])) ? NULL : $_POST["nombre"];
    $apellidos=(empty($_POST["formaf"])) ? NULL : $_POST["formaf"];
    $telefono=(empty($_POST["prest"])) ? NULL : $_POST["prest"];
    $correo=(empty($_POST["conc"])) ? NULL : $_POST["conc"];

       require_once 'SQL.php';
       require_once '../conn.php';
       $conn = new conn();
       $con=$conn->conectar();
       echo $_SESSION['name'];
       $this->setUser($_SESSION['name']);
      
       if($nombre &&  $apellidos && $telefono && $correo){
           $values=$this->get_Id().",'$nombre','$apellidos','$telefono','$correo'";
           $objsql= new metodosSQL();
           $que="INSERT INTO medicamentos(fk_medico,nombre,forma_fa,presentacion,concentracion)  VALUES (".$values.");";
        
           $objsql->insertar($con,$que);
           header('location:../tabla_medicamentos.php');
        }
    }
}


  $medicamento= new medicamentos();
  $medicamento->cargar();
    

 
    

    

?>