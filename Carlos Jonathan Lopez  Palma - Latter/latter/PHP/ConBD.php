<?php
	function conectar(){
		$user="root";
		$pass="";
		$server="localhost";
		$db="latter";
		$con=mysqli_connect($server,$user,$pass,$db) or die ("error al conectar".mysql_error());
		return $con;
	}
?>