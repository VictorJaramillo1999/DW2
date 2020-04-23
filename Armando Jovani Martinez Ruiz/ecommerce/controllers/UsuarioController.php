<?php

require_once 'models/Usuario.php';

//Controlador usuario
class UsuarioController{


    public function registro(){

        if($_POST){

            //Recibe los datos
            $nombre= $_POST['nombre'];
            $apellidos=$_POST['apellidos'];
            $email=$_POST['email'];
            $password=$_POST['password'];

            $usuario = new Usuario();

            $usuario->setNombre($nombre);
            $usuario->setApellidos($apellidos);
            $usuario->setEmail($email);

            //encriptar password
            $passwordSegura = password_hash($password, PASSWORD_BCRYPT , ['cots'=>2,]);
            $usuario->setPassword($passwordSegura);

            $registro = $usuario->guardar();

            if($registro==true){
    
               echo '<script language="javascript">alert("Registro completado correctamente");</script>'; 
            }else{
                echo '<script language="javascript">alert("Correo electrónico repetido");</script>'; 
            }

        }   
        
       require_once 'views/producto/destacados.php';
    }

}

?>

