<?php
session_start();
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Check Login and create session</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
		
			<?php
				include("ConBD.php");
				$con=conectar();
				
				$user = $_POST['user']; 
				$password = $_POST['password'];
				
				$query="SELECT c.IDPERSONA, c.USUARIO, c.CONTRASENA, p.ID, p.NOMBRE, p.APELLIDOPA, p.APELLIDOMA, e.PUESTO FROM cuentas c INNER JOIN persona p ON c.IDPERSONA = p.ID INNER JOIN empleado e ON c.IDPERSONA = e.IDPERSONA WHERE USUARIO = '$user'";
				$result=mysqli_query($con,$query);
				$mostrar=mysqli_fetch_array($result);
				
				$hash = $mostrar['CONTRASENA'];
				
				if (password_verify($_POST['password'], $hash)) {	
					
					$_SESSION['loggedin'] = true;
					$_SESSION['name'] = $mostrar['NOMBRE'];
					$_SESSION['ap'] = $mostrar['APELLIDOPA']." ".$mostrar['APELLIDOMA'];
					$_SESSION['puesto'] = $mostrar['PUESTO'];
					$_SESSION['id'] = $mostrar['ID'];
					$_SESSION['start'] = time();
					$_SESSION['expire'] = $_SESSION['start'] + (10 * 60) ;						
										
					if($_SESSION['puesto']=="ADMINISTRADOR"){
						header('Location: /latter/PHP/InicioAdmin.php');
					}else{
						header('Location: /latter/PHP/InicioUsua.php');
					}
				
				} else {
					echo "<div class='alert alert-danger mt-4' role='alert'>Usuario o contraseña incorrectos!
					<p><a href='/latter/login.html'><strong>Intenta de nuevo!</strong></a></p></div>";			
				}	
			?>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	</body>
</html>