<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: index.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('location: index.php');
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Agregar Auxiliares</title>
	<link rel="icon" href="Imagenes/Medisoft.png">
  <link rel="stylesheet" href="CSS/AgregarMedico.CSS">
</head>
<body>
<div class="header">
  <h1>Medisoft</h1>
</div>

<div class="topnav">
  <a href="cerrar_sesion.php" style="float:right">Cerrar Sesión</a>
	<div class="nav">
  <a href="RegresaMenu.php">Gestión Auxiliares</a>
  </div>
</div>

<div class="container">
  <div class="TituloG">
    <h2>Agregar auxiliares farmaceuticos</h2>  
  </div>

  <form class="form_agregar" action="AgregaAuxiliar.php">
    <div class="Grupo_form">
      <label for="Id_empleado" class="col2 control_label">Id empleado</label>
        <div class="columna_cajas">
          <input type="text" class="control_form" id="Id_empleado" name="Id_empleado" placeholder="Id empleado(s)" required>
        </div>
    </div>
    
    <div class="Grupo_form">
      <label for="Nombre" class="col2 control_label">Nombre</label>
        <div class="columna_cajas">
          <input type="text" class="control_form" id="Nombre" name="Nombre" placeholder="Nombre(s)" required>
        </div>
    </div>

    <div class="Grupo_form">
      <label for="Telefono" class="col2 control_label">Telefono</label>
        <div class="columna_cajas">
          <input type="text" class="control_form" id="Telefono" name="Telefono" placeholder="Telefono" required>
        </div>
    </div>

    <div class="Grupo_form">
      <label for="Fecha Nacimiento" class="col2 control_label">Fecha nacimiento</label>
        <div class="columna_cajas">
          <input type="text" class="control_form" id="Fecha_nacimiento" name="Fecha_nacimiento" placeholder="Fecha nacimiento" required>
        </div>
    </div>

    <div class="Grupo_form">
      <label for="Direccion" class="col2 control_label">Dirección</label>
        <div class="columna_cajas">
          <input type="text" class="control_form" id="Direccion" name="Direccion" placeholder="Dirección" required>
        </div>
    </div>

    <div class="Grupo_form">
      <label for="Codigo" class="col2 control_label">Codigo postal</label>
        <div class="columna_cajas">
          <input type="text" class="control_form" id="Codigo" name="Codigo_postal" placeholder="Codigo postal" required>
        </div>
    </div>

    <div class="Grupo_form">
      <label for="Codigo" class="col2 control_label">Email</label>
        <div class="columna_cajas">
          <input type="text" class="control_form" id="email" name="Email" placeholder="Email" required>
        </div>
    </div>

    <div class="Grupo_form">
      <label for="password" class="col2 control_label">Contraseña</label>
        <div class="columna_cajas">
          <input type="text" class="control_form" id="Contrasenia" name="Contrasenia" placeholder="Contraseña" required>
        </div>
    </div>

    
  </form>
 
</div>

<div class="footer">
  <h2>Contacto: Medisfotf@gmail.com</h2>
</div>

</body>
</html>
