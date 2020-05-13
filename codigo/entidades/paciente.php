<?php
include_once 'medico.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/codigo/entidades/paciente.php';

class paciente extends medicos{
    

    public function cargar(){
        session_start();
    $nombre=(empty($_POST["nom"])) ? NULL : $_POST["nom"];
    $apellidos=(empty($_POST["ape"])) ? NULL : $_POST["ape"];
    $telefono=(empty($_POST["tel"])) ? NULL : $_POST["tel"];
    $correo=(empty($_POST["corr"])) ? NULL : $_POST["corr"];
    $dia=(empty($_POST["fech"])) ? NULL : $_POST["fech"];
    $edad=(empty($_POST["edad"])) ? NULL : $_POST["edad"];
    $direccion=(empty($_POST["direc"])) ? NULL : $_POST["direc"];
    $sexo=(empty($_POST["sexo"])) ? NULL : $_POST["sexo"];
       require_once 'SQL.php';
       require_once '../conn.php';
       $conn = new conn();
       $con=$conn->conectar();
     
       $this->setUser($_SESSION['name']);
      
       if($nombre &&  $apellidos && $telefono && $correo && $dia && $edad && $direccion && $sexo ){
          echo $this->get_Id();
           $values=$this->get_Id().",'$nombre','$apellidos','$telefono','$direccion','$dia','$sexo','$correo',$edad";
           $objsql= new metodosSQL();
           $que="INSERT INTO pacientes(fk_medico,nombres,apellidos,telefono,direccion,fech_nac,sexo,email,edad) VALUES (".$values.");";
        
           $objsql->insertar($con,$que);
         
           //header('location:../tabla_pacientes.php');
        }
    }
}

  
    $paciente= new paciente();
  
    $paciente->cargar();
  

  
  
    

 
    

    

?>