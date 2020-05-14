<<?php 
	include_once 'database.php';
	session_start();

	if (isset($_GET['cerrar_sesion'])) {
		session_unset();

		session_destroy();
	}

	if (isset($_SESSION['rol'])) {
		switch ($_SESSION['rol']) {
			case '1':
				header('location: menuadmin.php');
				break;
			case '2':
				header('location: menumedico.php');
				break;
			case '3':
				header('location: menuempleado');
				break;
			default:
				
				break;
		}
	}

	if(isset($_POST['email']) && isset($_POST['Contrasenia']))
	{
		$username = $_POST['email'];
		$password = $_POST['contrasenia'];

		$db = new Database();
		$query = $db->connect()->prepare('SELECT * FROM usuarios WHERE Email = :email AND Constrasenia = :contrasenia');
		$query->execute(['Email' => $username], 'Constrasenia' => $password);

		$row = $query->fletch(PDO::FETCH_NUM);
		if ($row == true) {
			$rol = $row[4];
			$_SESSION['rol'] = $rol;

			switch ($_SESSION['rol']) {
				case '1':
				header('location: menuadmin.php');
				break;
			case '2':
				header('location: menumedico.php');
				break;
			case '3':
				header('location: menuempleado');
				break;
			default:
				
				break;
			}
		}else
		{
			echo "El usuario o contraseña son incorrectos";
		}
	}
?>
:	