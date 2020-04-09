<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Inicio</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="manifest" href="/manifest.json">
        <link rel="stylesheet" href="/latter/CSS/estilo.css" type="text/css"/>

    </head>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	
    <body>
    <?php
        if (isset($_SESSION['loggedin'])) {  
        }
        else {
            echo "<div class='alert alert-danger mt-4' role='alert'>
            <h4>Inicia sesión para acceder a la pagina.</h4>
            <p><a href='http://localhost/latter/login.html'>Iniciar sesión!</a></p></div>";
            exit;
        }
        $now = time();           
        if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "<div class='alert alert-danger mt-4' role='alert'>
            <h4>Tu sesión ha terminado!</h4>
            <p><a href='http://localhost/latter/login.html'>Inicia sesión</a></p></div>";
            exit;
        }
        if ($_SESSION['puesto']=="ADMINISTRADOR") {
            session_destroy();
            echo "<div class='alert alert-danger mt-4' role='alert'>
            <h4>Privilegios Insuficientes!</h4>
            <p><a href='http://localhost/latter/login.html'>Inicia sesión</a></p></div>";
            exit;
        }

    ?>
        <div class="main">
            <div class="head">
                <a href="logout.php">
                    <i class="icono izq fa fa-sign-out-alt" title="salir"></i>
                </a>
            </div>
                <h3 class="encabezado" align="center" style="color:#005892;">Inicio</h3>
                <h3 class="" style="color:#445255; margin-left: 38px;"> Bienvenido! <?php echo $_SESSION['name'] ?></h3>
                
            <hr style="margin-left: 40px; margin-right: 40px;">
            <br>
            <div class="row pantalla">
                <div class="col-lg-3 opc" >
                    <a href="InfoCont.php">
                        <img src="/latter/img/datos.png" style="width:90%;">
                        <h3 class=>Imformación de contacto</h3>
                    </a>
                </div>
                <div class="col-lg-3 opc" >
                    <a href="CambioContra.php">
                        <img src="/latter/img/contr.png" style="width:90%;">
                        <h3 class=>Cambiar contraseña</h3>
                    </a>
                </div>
                <div class="col-lg-3 opc" >
                    <a href="ReportesUsPHP.php">
                        <img src="/latter/img/rep2.png" style="width:90%;">
                        <h3 class=>Retardos</h3>
                    </a>
                </div>
            </div>
            
        </div>
    </body>