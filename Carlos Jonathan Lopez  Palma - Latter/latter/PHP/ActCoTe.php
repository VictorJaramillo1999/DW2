<?php
session_start();
	include("ConBD.php");
	$con=conectar();
	
	$tel = $_POST['tel']; 
    $email = $_POST['email'];
    
    $query = "UPDATE persona SET TELEFONO='$tel', EMAIL='$email' WHERE ID='$_SESSION[id]'";
    $result=mysqli_query($con,$query);
    header('Location: InfoCont.php');
?>