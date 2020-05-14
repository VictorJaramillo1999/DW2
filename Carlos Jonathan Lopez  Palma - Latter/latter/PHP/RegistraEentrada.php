<?php 
	include("ConBD.php");
	$con=conectar();
	
	$user = $_POST['user'];
	$existe = 0;
	if($user!=''){
		$sql="SELECT ID FROM persona WHERE ID = '$user'";
		$result=mysqli_query($con,$sql);
    	while ($mostrar=mysqli_fetch_array($result)) {
			$existe=1;
		}
	date_default_timezone_set('America/Mexico_City');
	$hoy = date("Y-m-d");
	$ayer = date("Y-m-d",strtotime('-1 day'));
	if($existe==1){
		$query="SELECT ESTADO, FECHA, EDO FROM asistencia WHERE IDPERSONA = '$user'";
		$result = mysqli_query($con,$query);
		$mostrar=mysqli_fetch_array($result);
		
		$fechabd = date("Y-m-d",strtotime($mostrar['FECHA']));
				
		if(($mostrar['ESTADO']=="AUSENTE" & $mostrar['EDO']=="2" & $mostrar['FECHA']!=$hoy & $mostrar['FECHA']==$ayer)|
			($mostrar['ESTADO']=="PRESENTE" & $mostrar['EDO']=="1" & $fechabd==$ayer)){
			$query="UPDATE asistencia SET FECHA = '$hoy', EDO = '1', ESTADO = 'PRESENTE' WHERE IDPERSONA = '$user'";
			$ejec=mysqli_query($con,$query);
			
			
			$query="SELECT HORAENTRADA FROM empleado WHERE IDPERSONA = '$user'";
			$result=mysqli_query($con,$query);
			$mostrar=mysqli_fetch_array($result);///hora entrada
			$newDate = date("H:i:s", strtotime($mostrar[0]));
			
			$hora = date("H:i:s");
			if($hora>$newDate){
				$monto = 50.00;
				$query="INSERT INTO reportes VALUES('$user','$hoy','$hora','RETARDO','$monto')";
				$result=mysqli_query($con,$query);
			}
			echo 'entrada';
			
		}else if($mostrar['ESTADO']=="PRESENTE" & $mostrar['EDO']=="1" & $fechabd==$hoy){
				$query="UPDATE asistencia SET EDO = '2', ESTADO = 'AUSENTE' WHERE IDPERSONA = '$user'";
				$ejec=mysqli_query($con,$query);
				
				$query="SELECT HORASALIDA FROM empleado WHERE IDPERSONA = '$user'";
				$result=mysqli_query($con,$query);
				$mostrar=mysqli_fetch_array($result);///hora salida
				$newDate = date("H:i:s", strtotime($mostrar[0]));
				date_default_timezone_set('America/Mexico_City');
				$hora = date("H:i:s");
				if($hora<$newDate){
					$fecha = date("Y-m-d");
					$monto = 60.00;
					$query="INSERT INTO reportes VALUES('$user','$fecha','$hora','RETIRO TEMPRANO','$monto')";
					$result=mysqli_query($con,$query);
				}
				echo 'salida';
			}else if($mostrar['ESTADO']=="AUSENTE" & $mostrar['EDO']=="2" & $fechabd==$hoy){
				echo 'terminada';
			}
	}
	}else {
		echo 'false';
	}
?>
	