<?php
	include("ConBD.php");
    $con=conectar();
    $id = $_POST['id'];
    $query="SELECT HORAENTRADA, HORASALIDA, DESCANSO FROM empleado WHERE IDPERSONA = '$id'";
    $result=mysqli_query($con,$query);
    $mostrar=mysqli_fetch_array($result);
    echo $mostrar['HORAENTRADA']." ".$mostrar['HORASALIDA']." ".$mostrar['DESCANSO'];

?>
    