<?php
	include("ConBD.php");
	$con=conectar();
	
	$id = $_POST['id'];
	$tel = strtoupper($_POST['tel']); 
	$email = $_POST['email']; 
	$puesto = strtoupper($_POST['puesto']); 
	$horae = $_POST['horae']; 
	$horas = $_POST['horas']; 
    $diadesc = $_POST['diadesc']; 

    echo'';

    $query = "UPDATE empleado SET PUESTO='$puesto', HORAENTRADA='$horae', HORASALIDA='$horas', DESCANSO='$diadesc' WHERE IDPERSONA='$id'";
    $result=mysqli_query($con,$query);

    $query = "UPDATE persona SET TELEFONO='$tel', EMAIL='$email' WHERE ID='$id'";
    $result=mysqli_query($con,$query);

	echo "actualizacion";
?>