<?php
	include("conexion.php");
	$con=conectar();
	
	$nombre = $_POST['nombre'];
	$dir = $_POST['direc']; 
	$sexo = $_POST['sexo']; 
	$edad = $_POST['edad']; 
	$tel = $_POST['tel']; 
	$email = $_POST['email']; 
	$tra = $_POST['tra']; 
	$fec = $_POST['fec']; 
	$hora = $_POST['hora']; 
	$id = 0;
	$existe = 0;
	$sql="SELECT *FROM registro WHERE Nombre = '$nombre'";
	$result=mysqli_query($con,$sql);
        while ($mostrar=mysqli_fetch_array($result)) {
			$existe=1;
		}
		
	if($existe==1){
		$sql2="INSERT INTO citas VALUES('$nombre','$tra','$fec','$hora')";
		$ejec=mysqli_query($con,$sql2);
	}else{
		$sql2="INSERT INTO registro VALUES('$id','$nombre','$dir','$email','$tel','$edad','$sexo')";
		$ejec=mysqli_query($con,$sql2);
	
		$sql2="INSERT INTO citas VALUES('$nombre','$tra','$fec','$hora')";
		$ejec=mysqli_query($con,$sql2);
	}
?>
<html>
    <head>
        <title>DentalStudio - Inicio</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="manifest" href="/manifest.json">
        <link rel="stylesheet" href="CSS/estilo.css" type="text/css"/>
    </head>

    <body>
        <header>
            <section class="areasup">
                <div class="container header-area">
                    <div class="row titulo">
                        <img src="Imagenes/Logom.png">
                        <div class="col-md-3" >
                            <p class="p">
                                <span class="encab1">Dental</span>
                                <span class="encab2">Studio</span> 
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <div class="menu-bar text-left">
                <nav  role="menu"> 
                    <ul class="menu">
                        <li><a href="http://localhost/DentalStudio/web/index.html">Inicio</a></li>
                        <li><a href="http://localhost/DentalStudio/web/servicio.html">Servicios/Tratamientos</a></li>
                        <li><a href="http://localhost/DentalStudio/web/Ubicanos.html">Visitanos</a></li>
                        <li><a href="http://localhost/DentalStudio/web/cita.php">Has tu cita</a></li>
                    </ul>
                </nav>
            </div>
        </header>
		<div class="container" id="mensajes">
            <h4 class="encabpag" align="center">Cita Agendada</h4>
			<li><a href="http://localhost/DentalStudio/web/index.html" class="encabpag">Inicio</a></li>
            <li><a href="http://localhost/DentalStudio/web/cita.php" class="encabpag">Agendar otra cita</a></li>
        </div>

        <footer class="page-footer font-small unique-color-dark" style="background:#0092B7;">
            <div style="background-color:#268AA4;">
                <div class="container">
                    <div class="row py-4 d-flex align-items-center">
                        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                            <h6 class="mb-0" style="color: #fff;">¡Buscanos en nuestras redes sociales!</h6>
                        </div>
                        <div class="col-md-6 col-lg-7 text-center text-md-right">
                            <!-- Facebook -->
                            <a class="fb-ic">
                                <i class="fab fa-facebook-f white-text mr-4" style="color:#fff;"> </i>
                            </a>
                            <!-- Twitter -->
                            <a class="tw-ic">
                                <i class="fab fa-twitter white-text mr-4"style="color:#fff;"> </i>
                            </a>
                            <!-- Google +-->
                            <a class="gplus-ic">
                                <i class="fab fa-google-plus-g white-text mr-4"style="color:#fff;"> </i>
                            </a>

                        </div>

                    </div>

                </div>
            </div>

            <div class="container text-center text-md-left mt-5">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <img src="Imagenes/Logom.png">
                        <span style="color:#E5EDE7">La salud esta en tu sonriza</span>

                        <h6 class="text-uppercase font-weight-bold" style="color:#E5EDE7;">
                            Contamos con las mejores herramientas para brindarte el mejor servicio.
                        </h6>
                    </div>

                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase font-weight-bold" style="color:#E5EDE7 ;">Información</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p><a href="http://localhost/DentalStudio/web/Ubicanos.html" style="color: #07153B;">Consultorio</a></p>
                        <p><a href="http://localhost/DentalStudio/web/servicio.html" style="color: #07153B;">Servicios/Tratamientos</a></p>
                    </div>

                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                        <h6 class="text-uppercase font-weight-bold" style="color:#E5EDE7 ;">Contactanos</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">

                        <p><i class="fas fa-home mr-3"></i> Metepec, EdoMex.</p>
                        <p><i class="fas fa-envelope mr-3"></i> DentStud@gmail.com</p>
                        <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                    </div>

                </div>

            </div>

            <div class="footer-copyright text-center py-3">✰ 2019 DentalStudio:
                <a href="http://localhost/DentalStudio/web/index.html"> DentalStudio.com</a>
            </div>
        </footer>
    </body>
    <script src="revisar.js"></script>
    <script src="principal.php"></script>
</html>