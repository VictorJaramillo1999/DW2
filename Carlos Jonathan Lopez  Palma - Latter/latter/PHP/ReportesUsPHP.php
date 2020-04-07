<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>EM - Registro</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="manifest" href="/manifest.json">
        <link rel="stylesheet" href="/latter/CSS/estilo.css" type="text/css"/>
		<link rel="stylesheet" href="/latter/CSS/estilo-menu.css" type="text/css"/>
		<script>
            function fecha(){
                semana=["Domingo","Lunes","Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
                mes=["enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"];
	            today=new Date();
	            did=today.getDay();
	            din=today.getDate();
	            me=today.getMonth();
                a=today.getFullYear();
                var fechaa=semana[did]+", "+din+" de "+ mes[me]+" de "+a;
                document.getElementById("dia").innerHTML="Fecha de emisión: "+fechaa;
            }
            window.onload=function(){fecha();}
        </script>
		
    </head>

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
		<div class="contenedor-menu sidebar">
			<h2 href="#" class="btn-menu">Menú<i class=""></i></h2>
			<ul  class="menu">
				<li><a href="InicioUsua.php"><i class="icono izq fa fa-home"></i>Inicio</a></li>
				<li><a href=""><i class="icono izq fa fa-user"></i>Usuario<i class="icono der fa fa-chevron-down"></i></a>
					<ul>
						<li><a href="InfoCont.php">Datos de contacto</a></li>
						<li><a href="CambioContra.php">Modificar contraseña</a></li>
					</ul>
				</li>
				<li><a href=""><i class="icono izq fa fa-flag"></i>Reportes</a></li>
				<li><a href="logout.php"><i class="icono izq fa fa-sign-out-alt"></i>Salir</a></li>
			</ul>
		</div>
		<div class="cuerpo">
			<div class="cabecera" style="padding: 8.5px 10px;">
				<i class="fas fa-bars"></i>
			</div>
			<div class="content" style="padding: 50px;">
                <h3 class="encabezado" align="center" style="color:#930707;">Lista de reportes</h3>
                <hr>
                <div>
                    <br>
                    <div class="row">
                        <div class="col-md-8">
                            <p class="label-rep">ID: <?php echo $_SESSION['id']?></p>
                            <p class="label-rep">Nombre: <?php echo $_SESSION['name']." ".$_SESSION['ap']?></p>
                        </div>
                        <div class="col-md-4">
                            <p class="label-rep" id="dia"></p>
                        </div>
                    </div>
                </div>
                <div>
                    <table class="tabla" id="t01">
                        <tr>
                            <th>Descripción</th><th>Fecha</th><th>Hora</th><th>Monto</th>
                        </tr>
                        <?php
                            include("ConBD.php");
                            $con=conectar();
                            if (!$con) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                        
                            $query="SELECT DESCRIPCION, FECHA, HORA, MONTO FROM reportes WHERE IDPERSONA='$_SESSION[id]'";
                            $result=mysqli_query($con,$query);
                            while ($mostrar = mysqli_fetch_array($result)) {
                        ?>
                                <tr class="fila">
                                    <td class="treport"><?php echo $mostrar['DESCRIPCION'] ?></td>
                                    <td ><?php echo $mostrar['FECHA'] ?></td>
                                    <td ><?php echo $mostrar['HORA'] ?></td>
                                    <td ><?php echo $mostrar['MONTO'] ?></td>
                                </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                    </div>
                </div>
                <br>
                <div class="" style="padding-right: 130px;">
                    <input type="submit" value="Imprimir" class="btn boton btn-info btn-lg" onclick="window.print();">
                </div>
            </div>
        </div>
	</body>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="/latter/JS/main.js"></script>
</html>