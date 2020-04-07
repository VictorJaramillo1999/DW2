<?php
session_start();
	include("ConBD.php");
	$con=conectar();
	
    $pass = password_hash($_POST['cont'], PASSWORD_DEFAULT);

    $query = "UPDATE cuentas SET CONTRASENA = '$pass' WHERE IDPERSONA = '$_SESSION[id]'";
    if($result=mysqli_query($con,$query)){
        echo 'correcta';
    }
    
?>