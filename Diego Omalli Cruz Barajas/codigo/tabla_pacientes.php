<?php

session_start();
$sessionofuser =$_SESSION['name'];
if(!isset($sessionofuser)){
  header("location:loginmedicos.php");
}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>dashboard</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="CSS/dashboardstyles.css">
        <link rel="stylesheet" href="CSS/dashgeneral.css">
        <link rel="stylesheet" href="CSS/searchandnew.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="manifest" href="json/manifest.json">
    </head>


	<body translate="no" style="background-color: rgb(239, 241, 247);">
		<!-- Modal -->
<div class="modal fade"  id="form-pacientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Paciente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<form  method="post" style="height:10%;"  id="formapacientes">

			<div class="form-group ">
				<label for="exampleInputPassword1">Nombres</label>
				<input type="text" name="nom" class="form-control" id="medicamento" placeholder="Nombres" required autofocus>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Apellidos</label>
				<input type="text" name="ape" class="form-control" id="ffarmaceutica" placeholder="Apellidos" required autofocus>
			</div>
			<div class="form-group">

				<label for="exampleInputPassword1">Telefono</label>
				<input type="text" name="tel" class="form-control" id="presentacion" placeholder="Telefono" required autofocus>
			</div>
			<div class="form-group">

			<label for="validationDefault01">Fecha de nacimiento</label>
			<input type="date" name="fech" class="form-control" id="validationDefault01" placeholder="First name" required>
			</div>

			<div class="form-group">
			<label for="email">Correo electronico</label>
			<input class="form-control" type="email" name="corr" aria-describedby="emailHelp" required>
			<small id="emailHelp"  class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
					<div class="form-row">
						<div class="col-md-6 mb-4">
						<label for="validationDefault01">Sexo</label>
						<input type="text" name="sexo" class="form-control" id="validationDefault0s" placeholder="First name" value="Mark" required>
						<small id="validationDefault01"  class="form-text text-muted">Solo pudes introducir un caracter.</small>
						</div>
						<div class="col-md-6 mb-4">
						<label for="validationDefault02">Edad</label>
						<input type="text" name="edad" class="form-control validcontrol" id="validationDefault02" placeholder="Edad" required>
						</div>
					     
					</div>

				<div class="mb-3">
				<label for="validationTextarea">Direccion</label>
				<textarea class="form-control is-invalid" name="direc" rows="5" id="validationTextarea" placeholder="Direccion" required></textarea>
				<div class="invalid-feedback">
				Please enter a message in the textarea.
				</div>
               </div>
			<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" name="guardarmedica" class="btn btn-primary" onclick="agregardatos()">Guardar datos</button>
			</div>
			</div>
			
			</form>
      </div>
    </div>
  </div>
</div>
		<div class="page-wrapper chiller-theme toggled">
			<a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
			  <i class="fas fa-bars"></i>
			</a>
			<nav id="sidebar" class="sidebar-wrapper">
			  <div class="sidebar-content">
				<div class="sidebar-brand">
				  <a href="#">pro sidebar</a>
				  <div id="close-sidebar">
					<i class="fas fa-times"></i>
				  </div>
				</div>
				<div class="sidebar-header">
				  <div class="user-pic">
					<img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
					  alt="User picture">
				  </div>
				  <div class="user-info">
					<span class="user-name"><?php ?>
					  <strong><?php echo $_SESSION['nombres']; ?></strong>
					</span>
					<span class="user-role">Administrator</span>
					<span class="user-status">
					  <i class="fa fa-circle"></i>
					  <span>Online</span>
					</span>
				  </div>
				</div>
				<!-- sidebar-header  -->
				<div class="sidebar-search">
				  <div>
					<div class="input-group">
					  <input type="text" class="form-control search-menu" placeholder="Search...">
					  <div class="input-group-append">
						<span class="input-group-text">
						  <i class="fa fa-search" aria-hidden="true"></i>
						</span>
					  </div>
					</div>
				  </div>
				</div>
				<!-- sidebar-search  -->
				<div class="sidebar-menu">
				  <ul>
					<li class="header-menu">
					  <span>General</span>
					</li>
					<li class="sidebar-dropdown">
					  <a href="tabla_pacientes.php">
						<i class="fas fa-user-injured"></i>
						<span>Pacientes</span>
						<span class="badge badge-pill badge-warning">New</span>
					  </a>
					  <div class="sidebar-submenu">
						<ul>
						  <li>
							<a href="#">Dashboard 1
							  <span class="badge badge-pill badge-success">Pro</span>
							</a>
						  </li>
						  <li>
							<a href="#">Dashboard 2</a>
						  </li>
						  <li>
							<a href="#">Dashboard 3</a>
						  </li>
						</ul>
					  </div>
					</li>
					<li class="sidebar-dropdown">
					  <a href="#">
						<i class="fas fa-stethoscope"></i>
						<span>Nuevo caso</span>
						<span class="badge badge-pill badge-danger">3</span>
					  </a>
					  <div class="sidebar-submenu">
						<ul>
						  <li>
							<a href="#">Productos
		  
							</a>
						  </li>
						  <li>
							<a href="#">Orders</a>
						  </li>
						  <li>
							<a href="#">Credit cart</a>
						  </li>
						</ul>
					  </div>
					</li>
					<li class="sidebar-dropdown">
					  <a href="tabla_citas.php">
						<i class="fas fa-calendar-week"></i>
						<span>Citas</span>
					  </a>
					  <div class="sidebar-submenu">
						<ul>
						  <li>
							<a href="#">General</a>
						  </li>
						  <li>
							<a href="#">Panels</a>
						  </li>
						  <li>
							<a href="#">Tables</a>
						  </li>
						  <li>
							<a href="#">Icons</a>
						  </li>
						  <li>
							<a href="#">Forms</a>
						  </li>
						</ul>
					  </div>
					</li>
					
					<li class="sidebar-dropdown">
					  <a href="tabla_medicamentos.php">
						<i class="fas fa-capsules"></i>
						<span>Medicamentos</span>
					  </a>
					  <div class="sidebar-submenu">
						<ul>
						  <li>
							<a href="#">Pie chart</a>
						  </li>
						  <li>
							<a href="#">Line chart</a>
						  </li>
						  <li>
							<a href="#">Bar chart</a>
						  </li>
						  <li>
							<a href="#">Histogram</a>
						  </li>
						</ul>
					  </div>
					</li>
					<!--
					<li class="sidebar-dropdown">
					  <a href="#">
						<i class="fa fa-globe"></i>
						<span>Medicamentos</span>
					  </a>
					  <div class="sidebar-submenu">
						<ul>
						  <li>
							<a href="#">Google maps</a>
						  </li>
						  <li>
							<a href="#">Open street map</a>
						  </li>
						</ul>
					  </div>
					</li>
					<li class="header-menu">
					  <span>Extra</span>
					</li>
					<li>
					  <a href="#">
						<i class="fa fa-book"></i>
						<span>Documentation</span>
						<span class="badge badge-pill badge-primary">Beta</span>
					  </a>
					</li>
					<li>
					  <a href="#">
						<i class="fa fa-calendar"></i>
						<span>Calendar</span>
					  </a>
					</li>
					<li>
					  <a href="#">
						<i class="fa fa-folder"></i>
						<span>Examples</span>
					  </a>
					</li>
				-->
				  </ul>
				</div>
				<!-- sidebar-menu  -->
			  </div>
			  <!-- sidebar-content  -->
			  <div class="sidebar-footer">
				<a href="#">
				  <i class="fa fa-bell"></i>
				  <span class="badge badge-pill badge-warning notification">3</span>
				</a>
				<a href="#">
				  <i class="fa fa-envelope"></i>
				  <span class="badge badge-pill badge-success notification">7</span>
				</a>
				<a href="#">
				  <i class="fa fa-cog"></i>
				  <span class="badge-sonar"></span>
				</a>
				<a href="logout.php">
				  <i class="fa fa-power-off"></i>
				</a>
			  </div>
			</nav>
			<!-- sidebar-wrapper  -->
			
			<main class="page-content">
				
				<header class="headr">
					<div class="wrapper">
						<h2 class="logo" ><img src="IMG/medifastlogo.png" alt="medicalvue" width="200" height="98"></h2>
						
						<nav>
							<a href="#">Iniciar sesion</a>
							
						</nav>
					</div>
				</header> 
			  
                <div class="search-paci">
				  <div>
					<div class="input-group">
					  <input type="text" class="form-control search-menu" placeholder="Search...">
					  <div class="input-group-append">
						<span class="input-group-text">
						  <i class="fa fa-search" aria-hidden="true"></i>
						</span>
					  </div>
					</div>
				  </div>
				</div>
                
                  <div id="general">
                    
                  <div class="container">
                                <div class="jumbotron">
                                        <div class="card">
                                        <div class="card-header">
                                            Pacientes
											<span style="margin-left:80%;">
											<a href="" class="btn btn-success btn-sm" role="button" aria-pressed="true" data-toggle="modal" data-target="#form-pacientes">Nuevo</a>
						                   </span>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Datos de Pacientes</h5>
                                                <table class="table table-hover table-bordered" style="text-size:12px;">
                                                <thead>
                                                    <tr>
                                                        
                                                        <th>Nombre</th>
                                                        <th>Apellidos</th>
                                                        <th>Telefono</th>
                                                        <th>Direccion</th>
                                                        <th>Nacimiento</th>
                                                        <th>Sexo</th>
                                                        <th>Email</th>

                                                        <th class="text-center">Accion</th>
                                                    </tr>    
                                                </thead>
                                                <tbody> 
                                                    <tr>
                                                        <th>Juan diaz</th>
                                                        <th>Gonzales Sanabria</th>
                                                        <th>733425221</th>
                                                        <th>San dimas,los postales. no.34.</th>
                                                        <th>17/02/1999</th>
                                                        <th>M</th>
                                                        <th><a href="" >mosvi_randy@hotmail.com</a></th>
                                                        <th class="text-center">
                                                           
                                                            <a href="" class="btn btn-info btn-sm badge-pill" style="width:80px;" role="button" aria-pressed="true"><i class="fas fa-magic"></i></a>
                                                          
                                                        </th>
                                                    </tr>    
                                                </tbody>

                                            </table>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            
                        <div>
                    
                </div>
				 
		<script src="JS/menuslide.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
			integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
		</script>
		<script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/7edcc08e48.js" crossorigin="anonymous"></script>
		<script src="JS/menuslide.js" type="text/javascript"></script>
		<script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js " > </script> 
		<script src="JS/sinitize.js" type="text/javascript"></script>
	</body>
</html>
