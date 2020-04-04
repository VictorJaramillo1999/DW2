<?php
	include("ConBD.php");
	$con=conectar();
	
	$nombres = strtoupper($_POST['nombres']);
	
	$app = strtoupper($_POST['app']);
	$apm = strtoupper($_POST['apm']);
	$fechana = strtoupper($_POST['fechana']); 
	$sexo = strtoupper($_POST['sexo']); 
	$curp = strtoupper($_POST['curp']); 
	$rfc = strtoupper($_POST['rfc']); 
	$direc = strtoupper($_POST['direc']); 
	$tel = strtoupper($_POST['tel']); 
	$email = $_POST['email']; 
	$nseg = strtoupper($_POST['nseg']); 
	$anio = date('Y');
	
	$puesto = strtoupper($_POST['puesto']); 
	$horae = $_POST['horae']; 
	$horas = $_POST['horas']; 
	$diadesc = $_POST['diadesc']; 
	
	$sql="SELECT CURP FROM persona WHERE CURP = '$curp'";
	$result=mysqli_query($con,$sql);
	$row =mysqli_fetch_array($result);
    if($row['CURP']==$curp){
		echo 'false';
	}else{
		$quaery="INSERT INTO persona VALUES('0','$nombres','$app','$apm','$fechana','$sexo','$curp','$rfc'
		,'$direc','$tel','$email','$nseg')";
		$result=mysqli_query($con,$quaery);

		$sql="SELECT ID FROM persona WHERE CURP = '$curp'";
		$result=mysqli_query($con,$sql);
		$row =mysqli_fetch_array($result);
		$idp = $row['ID'];

		$quaery="INSERT INTO empleado VALUES('$idp','$puesto','$horae','$horas','$diadesc','$anio')";
		$result=mysqli_query($con,$quaery);
		
		$quaery="INSERT INTO asistencia VALUES('$idp','0000-00-00','2','AUSENTE')";
		$result=mysqli_query($con,$quaery);

		$usuario=substr($nombres,0,3).substr($app,0,3);
		$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890-_";
		$query="SELECT CONTRASEÑA FROM cuentas WHERE CONTRASEÑA = '$contra'";
		$result=mysqli_query($con,$query);
		$contbd=mysqli_fetch_array($result);
		$flag=true;
		while($flag){
			$contra = "";
			for($i=0;$i<11;$i++) {
				$contra .= substr($str,rand(0,64),1);
			 }
			if($contra!=$contbd){
				$flag=false;
			}
		}
		$quaery="INSERT INTO cuentas VALUES('$idp','$usuario','$contra')";
		$result=mysqli_query($con,$quaery);

		echo 'true';
	}
	
?>