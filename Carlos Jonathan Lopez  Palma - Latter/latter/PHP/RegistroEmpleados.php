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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		
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
						<li><a href="ListaEmpleadosPHP.php">Lista de empleados</a></li>
						<li><a href="Reportesphp.php">Lista de reportes</a></li>
						<li><a href="">Registro de empleados</a></li>
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
				<h3 class="encabezado" align="center" style="color:#005892;">Registro de Empleado</h3>
				<br>
				<hr>
				<h4 class="encabezado" align="center" style="color:#930707;">Datos personales</h4>

				<form name="form1" method="post" action="" onsubmit="return validar()" class="fondo">
					<div id="alerta" class="alerta"></div>
					<br>
					<div class="row">
						<div class="col-md-4 datain">
							<div class="form-group">
								<label class="control-label" for="Nombre">Nombre(s)</label>
								<input class="control-llenarin" type="text" placeholder="Nombre(s)"
								style="text-transform: uppercase;" id="nombres" name="nombres"
								onkeypress="return soloLetras(event)">
							</div>
							
							<div class="form-group">
								<label class="control-label" for="Apellido1">Apellido Paterno</label>
								<input class="control-llenarin" type="text" placeholder="Apellido Paterno"
									style="text-transform: uppercase;" id="app" name="app"
									onkeypress="return soloLetras(event)">
							</div>
							
							<div class="form-group">
								<label class="control-label" for="Apellido2">Apellido Materno</label>
								<input class="control-llenarin" type="text" placeholder="Apellido Materno"
									style="text-transform: uppercase;" id="apm" name="apm"
									onkeypress="return soloLetras(event)">
							</div>
							
							<div class="form-group">
								<label class="control-label" for="fechana">Fehca de nacimiento</label>
								<input class="control-llenarin" type="date" min="1930-12-31" max="2020-01-01"
								   id="fechana" name="fechana">
							</div>
	
							<div class="form-group">
								<label class="control-label" for="sexo">Sexo</label>
								<select class="control-combobx" name="sexo" id="sexo" style="text-transform: uppercase;">
									<option value="mujer">Mujer</option>
									<option value="hombre">Hombre</option>
								</select>
							</div>
						</div>
						<hr>
						<div class="col-md-8">
							<div class="row">
								<div class="form-group col-md-6">
									<label class="control-label" for="curp">CURP</label>
									<input class="control-llenarin" type="text" placeholder="CURP"
										style="text-transform: uppercase;" name="curp" id="curp">
								</div>
								<div class="form-group col-md-6">
									<label class="control-label" for="curp">RFC</label>
									<input class="control-llenarin" type="text" placeholder="RFC"
										style="text-transform: uppercase;" name="rfc" id="rfc">
								</div>
								<div class="form-group col-md-12">
									<label class="control-label" for="direc">Dirección</label>
									<input class="control-llenarin" type="text" placeholder="Dirección"
										style="text-transform: uppercase;" name="direc" id="direc">
								</div>
								
								<div class="form-group form-group col-md-6">
									<label class="control-label" for="Teléfonol">Teléfono</label>
									<input class="control-llenarin" type="numeric" placeholder="TELÉFONO" 
									maxlength="10" name="tel" id="tel" onkeypress="return soloNumeros(event)">
								</div>
								<div class="form-group col-md-6">
									<label class="control-label" for="Emaill">E-mail</label>
									<input class="control-llenarin" type="email" placeholder="E-MAIL" 
								   id="email" name="email">
								</div>
								<div class="form-group col-md-6">
									<label class="control-label" for="nseg">No. de Seguro</label>
									<input class="control-llenarin" type="numeric" placeholder="No. DE SEGURO" 
								   id="nseg" name="nseg"onkeypress="return soloNumeros(event)">
								</div>
							</div>
						</div>
					</div>
					<hr>
					<h4 class="encabezado" align="center" style="color:#930707;">Información Laboral</h4>
					<br>
					<div id="alerta2" class="alerta"></div>
					<div class="row ">
						<div class="form-group col-md-4 datala">
							<label class="control-label" for="puesto">Puesto</label>
							<select class="control-combobx" name="puesto" id="puesto" style="text-transform: uppercase;">
								<option value="Gerente">Gerente</option>
								<option value="Servicio al cliente">Servicio al cliente</option>
								<option value="Caja">Caja</option>
								<option value="Administrador">Administrador</option>
							</select>
						</div>
						<div class="col-md-8">
							<div class="row">
								<div class="form-group col-md-6">
									<label class="control-label" for="hora">Hora de entrada</label>
									<input class="control-llenarin" type="time" id="horae"
										placeholder="dd/mm/aaaa" name="horae">
								</div>
								
								<div class="form-group col-md-6">
									<label class="control-label" for="hora2">Hora de salida</label>
									<input class="control-llenarin" type="time" id="horas"
										placeholder="dd/mm/aaaa" name="horas">
								</div>
							</div>
							
							<div class="row form-group col-md-6">
								<label class="control-label" for="diadesc">Día de descanso</label>
								<select class="control-combobx" name="diadesc" id="diadesc">
									<option value="LUNES">LUNES</option>
									<option value="MARTES">MARTES</option>
									<option value="MIERCOLES">MIERCOLES</option>
									<option value="jJUEVES">JUEVES</option>
									<option value="VIERNES">VIERNES</option>
									<option value="SABADO">SABADO</option>
									<option value="DOMINGO">DOMINGO</option>
								</select>
							</div>
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="">
								<input type="reset" value="Cancelar" class="btn boton btn-danger btn-lg">
							</div>
							<div class="">
								<input type="submit" value="Guardar" class="btn btn-success btn-lg boton">
							</div>
						</div>
					</div>				
				</form>
			</div>
        </div>
        
	</body>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="/latter/JS/main.js"></script>
	<script src="/latter/JS/revisar.js"></script>
</html>
