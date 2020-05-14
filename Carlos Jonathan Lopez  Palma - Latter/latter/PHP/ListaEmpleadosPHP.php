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
        if ($_SESSION['puesto']!="ADMINISTRADOR") {
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
				<li><a href="InicioAdmin.php"><i class="icono izq fa fa-home"></i>Inicio</a></li>
				<li><a href="#"><i class="icono izq fa fa-users"></i>Empleados<i class="icono der fa fa-chevron-down"></i></a>
					<ul>
						<li><a href="">Lista de empleados</a></li>
						<li><a href="Reportesphp.php">Lista de reportes</a></li>
						<li><a href="RegistroEmpleados.php">Registro de empleados</a></li>
					</ul>
				</li>
				<li><a href="#"><i class="icono izq fa fa-user"></i>Usuario<i class="icono der fa fa-chevron-down"></i></a>
					<ul>
						<li><a href="InfoCont.php">Información de contacto</a></li>
						<li><a href="CambioContra.php">Modificar contraseña</a></li>
					</ul>
				</li>
				<li><a href="logout.php"><i class="icono izq fa fa-sign-out-alt"></i>Salir</a></li>
			</ul>
		</div>
		<div class="cuerpo">
            <div class="cabecera">
				<i class="fas fa-bars"></i>
			</div>
			<div class="content">
				<h3 class="encabezado" align="center" style="color:#005892;">Lista de Empleados</h3>
                <hr>
                <div id="alerta"></div>
                <div class="row">
                    <div class="col-md-8 " align="center">
                        <table class="tablaem" id="t01em">
                            <tbody>
                            <tr>
                                <th style="width: 10px;">ID</th><th>Nombre</th><th style="width: 100px;">Puesto</th><th style="width: 90px;">Correo</th><th style="width: 20px;">Teléfono</th>
                            </tr>
                            <?php
                                include("ConBD.php");
                                $con=conectar();
                            
                                $query="SELECT p.ID, p.NOMBRE, p.APELLIDOPA, p.APELLIDOMA, p.EMAIL, p.TELEFONO, e.PUESTO FROM empleado e INNER JOIN persona p ON e.IDPERSONA = p.ID";
                                $result=mysqli_query($con,$query);
                                while ($mostrar = mysqli_fetch_array($result)) {
                            ?>
                                    <tr class="filaem">
                                        <td class="temw"><?php echo $mostrar['ID'] ?></td>
                                        <td><?php echo $mostrar['NOMBRE']." ".$mostrar['APELLIDOPA']." ".$mostrar['APELLIDOMA'] ?></td>
                                        <td><?php echo $mostrar['PUESTO'] ?></td>
                                        <td><?php echo $mostrar['EMAIL'] ?></td>
                                        <td><?php echo $mostrar['TELEFONO'] ?></td>
                                    </tr>
                            <?php
                                }
                            ?>
                            <t/body>
                        </table>
                    </div>
                    <div class="col-md-4 scroll" align="center">
                        <h5 class="titem">Información</h5>
                        <form name="form1" method="post" action="" onsubmit="return validarli();" class="fm">
                        <div class="form-group">
                            <input class="input-emp" type="hidden" style="text-transform: uppercase;" 
                            id="id" readonly>
                        </div>
                        <div class="form-group">
                            <label class="label-emp" for="Nombre">Nombre</label>
                            <input class="input-emp" type="text" placeholder="Nombre"
                            style="text-transform: uppercase;" id="nombres" readonly>
                        </div>
                        <div class="form-group">
                            <label class="label-emp" for="Email">Correo</label>
                            <input class="input-emp" type="email" placeholder="E-MAIL" 
								id="email" required>
                        </div>
                        <div class="form-group">
                            <label class="label-emp" for="Teléfonol">Teléfono</label>
                            <input class="input-emp" type="numeric" placeholder="TELÉFONO" 
								maxlength="10" id="tel" onkeypress="return soloNumeros(event)" required>
                        </div>
                        <div class="form-group row rw">
                            <div class="col-md-6">
                                <div class="form-group-em">
                                    <label class="label-emp" for="horal">Hora de entrada</label>
                                    <input class="input-emp" type="time" id="hora1" name="hora1" required>
                                </div>
                            </div>
                            <div class="form-group-em col-md-6">
                                <label class="label-emp" for="hora2">Hora de salida</label>
                                <input class="input-emp" type="time" id="hora2" name="hora2" required>
                            </div>
                        </div>
                        <div class="form-group">
							<label class="label-emp" for="puesto">Puesto</label>
							<select class="cb-emp" id="puesto" style="text-transform: uppercase;">
                            <option value="-"> </option>
                                <option value="GERENTE">Gerente</option>
								<option value="SERVICIO AL CLIENTE">Servicio al cliente</option>
								<option value="CAJA">Caja</option>
								<option value="ADMINISTRADOR">Administrador</option>
							</select>
                        </div>
                        
                        <div class="form-group">
                            <label class="label-emp" for="diadesc">Día de descanso</label>
                            <select class="cb-emp" name="dia" id="dia">
                                    <option value=" "> </option>
                                    <option value="LUNES">LUNES</option>
									<option value="MARTES">MARTES</option>
									<option value="MIERCOLES">MIERCOLES</option>
									<option value="jJUEVES">JUEVES</option>
									<option value="VIERNES">VIERNES</option>
									<option value="SABADO">SABADO</option>
									<option value="DOMINGO">DOMINGO</option>
                            </select>
                        </div>
                        <div class="form-group row rw"style="margin-left: 20px;">
                            <div class="col-md-4" style="margin-left: 30px;">
                                <input type="submit" value="Actualizar" class="btn btn-warning btn-lg" onsubmit="">
                            </div>
                            <div class="col-md-4" style="margin-left: 30px;">
                            <button  class="btn btn-danger btn-lg btnel">Eliminar</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    
                    
                </div>
                <br>
			</div>
        </div>
        
    </body>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="/latter/JS/main.js"></script>
	<script src="/latter/JS/revisar.js"></script>
</html>
