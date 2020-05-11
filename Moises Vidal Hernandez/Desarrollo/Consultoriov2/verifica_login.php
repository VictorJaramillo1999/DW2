<?php
    include_once 'database.php';
    
    session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 

        // destroy the session 
        session_destroy(); 
    }
    
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
           case 1:
                    header('location: MenuAdmin.php');
                break;
    
                case 2:
                    header('location: MenuMedico.php');
                break;

                default:
        }
    }

    if(isset($_POST['Email']) && isset($_POST['Contrasenia'])){
        $username = $_POST['Email'];
        $password = $_POST['Contrasenia'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT * FROM usuarios WHERE Email = :Email AND Contrasenia = :Contrasenia');
        $query->execute(['Email' => $username, 'Contrasenia' => $password]);

        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){
            $rol = $row[11];
            
            $_SESSION['rol'] = $rol;
            switch($rol){
                case 1:
                    header('location: MenuAdmin.php');
                break;
    
                case 2:
                    header('location: MenuMedico.php');
                break;

                default:
            }
        }else{
            // no existe el usuario
            echo "Nombre de usuario o contraseña incorrecto";
        }
        

    }

?>