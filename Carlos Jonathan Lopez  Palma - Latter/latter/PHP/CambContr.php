<?php
session_start();
	include("ConBD.php");
	$con=conectar();
	
	$tel = $_POST['conta']; 
    $email = $_POST['nco'];
    
    $query = "UPDATE persona SET TELEFONO='$tel', EMAIL='$email' WHERE ID='$_SESSION[id]'";
    $result=mysqli_query($con,$query);
    header('Location: InfoCont.php');
?>