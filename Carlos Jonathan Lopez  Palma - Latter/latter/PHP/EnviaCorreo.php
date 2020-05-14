<?php
    function eviacorreo($email,$id,$usuario,$contra){
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
        $mail->AddAddress($email);
        $mail->Subject = 'Registro en Latter';
        $mail->Body = "Bienvenido a Latter\n Su ID es: ".$id."\nUsuario: ".$usuario."\nContraseña: ".$contra;
    
        //Avisar si fue enviado o no y dirigir al index
        if ($mail->Send()) {
            echo'Enviado Correctamente';
        } else {
            echo'NO ENVIADO, intentar de nuevo';
        }
    }
    
?>