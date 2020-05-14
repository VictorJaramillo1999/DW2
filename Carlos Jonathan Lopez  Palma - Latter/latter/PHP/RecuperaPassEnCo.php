<?php
        include("ConBD.php");
        $con=conectar();
        $correo = $_POST['email'];

        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890-_";
        $flag=true;
        $query="SELECT U.CONTRASENA, U.IDPERSONA FROM CUENTAS U , PERSONA P WHERE P.EMAIL='$correo' AND P.ID=U.IDPERSONA;";
        $result=mysqli_query($con,$query);
        $contbd=mysqli_fetch_array($result);
        
		while($flag){
			$contra = "";
			for($i=0;$i<11;$i++) {
				$contra .= substr($str,rand(0,64),1);
			}
			$contra2 = password_hash($contra, PASSWORD_DEFAULT);
				if($contra2!=$contbd['CONTRASENA']){
					$flag=false;
				}
        }
        $quaery="UPDATE cuentas SET CONTRASENA='$contra2' WHERE IDPERSONA='$contbd[IDPERSONA]'";
		$result=mysqli_query($con,$quaery);

        require 'PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer();
        $mail->IsSMTP();

        
        //Configuracion servidor mail
        $mail->From = "latter.proyecto@gmail.com"; //remitente
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls'; //seguridad
        $mail->Host = "smtp.gmail.com"; // servidor smtp
        $mail->Port = 587; //puerto
        $mail->Username ='latter.proyecto@gmail.com'; //nombre usuario
        $mail->Password = 'latter-py1'; //contraseña


        //Agregar destinatario
        $mail->AddAddress($correo);
        $mail->isHTML(TRUE);
        $mail->Subject = 'Latter - Recuperación de contraseña';
        $mail->Body = '<h3>Sistema de recuperación de contraseña - Latter</h3>
        <h4>Su nueva contraseña es: '.$contra.' </h4>
        <h4>Recomendamos cambiar su contraseña cuando inicie sesión.</h4>'
        ;
        
        
        //Avisar si fue enviado o no y dirigir al index
        if ($mail->Send()) {
            echo'si';
            header('Location: /Latter/login.html');
        } else {
            echo'no';
            header('Location: /Latter/login.html');

        }
    
?>