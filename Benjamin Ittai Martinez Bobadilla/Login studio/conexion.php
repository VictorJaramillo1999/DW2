<?php 
include("configuracion.php");
$conexion = new mysqli ($server,$user,$pass,$bd);
if(mysqli_connect_errno()){
	echo "no conectado",mysqli_connect_error();
	exit();
}else{
	echo 'conectado';
}
?>