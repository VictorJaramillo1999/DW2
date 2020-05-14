<?php
        require 'PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer();
        $mail->IsSMTP();

        $correo = $_POST['email'];
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
        $mail->Subject = 'Recuperar contraseña';
        $mail->Body = '<h3>Latter</h3>
        <h4>Siga esta ruta para cambiar su contraseña: <a href="http://localhost/latter/PHP/NuevaPass.php">Cambiar Contraseña</a></h4>';
        //Avisar si fue enviado o no y dirigir al index
        if ($mail->Send()) {
            echo'si';
            header('Location: /Latter/login.html');
        } else {
            echo'no';
            header('Location: /Latter/login.html');

        }
    
?>