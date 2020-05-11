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
            case 3:
                header('location: MenuAux.php');
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
                case 3:
                	header('location: MenuAux.php');
                break;
                default:
            }
        }else{
            // no existe el usuario
            echo "Nombre de usuario o contraseña incorrecto";
        }
        

    }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, inicial-scale=1.0">
	<link rel="stylesheet" href="CSS/EstilosVtnLogin.CSS">
	<link rel="icon" href="Imagenes/Medisoft.png">
	<title>Login</title>
</head>
<body>
	<header class="header">
		<div class="container logo-nav-container">
			<a href="#" class="Titulo">Medisoft</a>
			<nav class="navegacion">
			</nav>
		</div>
	</header>
	<main class="main">
		<div class="Container">
		<div class="logine">
			<form action="#" method="POST">
				
					<img src="Imagenes/users.png" class="img-responsiva" alt="LogoUser">
					<h2>Inicio de sesión</h2>
					<input type="email"  name="Email" placeholder="Inserte Correo">
					<input type="password" name="Contrasenia" placeholder="Inserte Contraseña">	
					<input type="submit"   name="enviado" value="Entrar" id="boton1">	
				
			</form>
		</div>
		</div>
	</main>
</body>
</html>