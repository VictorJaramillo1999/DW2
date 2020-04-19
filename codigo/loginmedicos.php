<?php
session_start();
if(isset($_SESSION['name'])){
    header("location:datos_medicos.php");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="CSS/loginstyle.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	</head>
	<body>
		
		<div id=titulo>
            <h2 class="encab" ><img src="IMG/medifastlogo.png" alt="medicalvue" width="200" height="98"></h2>
		</div>
		<!--Contenedor-->
		<div id="general">
			<div class=log>
				<form  action="verif_login.php" method="post">
					<?php
					if(isset($errorlogin)){
                       echo $errorlogin;
					}
					?>
					<h2>Login</h2>
					<label for="Correo">Correo Electronico</label>
					<div>
						<i class="far fa-user"></i>
					</div>
					<input type="email" name="email" aria-describedby="emailHelp" placeholder="Inserte Correo" required>
					<label for="Cotransena">Contraseña</label>

					<div>
						<i class="fas fa-key"></i>
					</div>
					<input type="password" name="password" placeholder="Inserte Contraseña" required>
					
					<div>
						<i class="fas fa-key"></i>
					</div>
					<button colspan="1" type="submit"  id="boton1">Iniciar Sesión</button>
                      
					<button colspan="1" type="button"  id="boton2">	<i class="fab fa-facebook-f"></i>Iniciar Sesión con Facebook</button>
					<button onclick="location.href='CreateAccount.html'" type="button" class="btn btn-link">¿Se te olvido tu crontaseña?</button>
				<div class="regis">
				    <b>¿No usas Medifast?<a href='CreateAccount.html' type="button" class="btn btn-link">Unete a nosotros</a></b>
				</div>
					
				</form>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/7edcc08e48.js" crossorigin="anonymous"></script>
	</body>
</html>