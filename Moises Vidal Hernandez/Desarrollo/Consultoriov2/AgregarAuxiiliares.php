<?php
  $host = 'localhost';
$basededatos = 'medisoft';
$usuario = 'root';
$contraseña = '';

$conexion = new mysqli($host, $usuario,$contraseña, $basededatos);
if ($conexion -> connect_errno) {
die( "Fallo la conexión : (" . $conexion -> mysqli_connect_errno() 
. ") " . $conexion -> mysqli_connect_error());
}

if(isset($_POST['guardar']))
{
  $Id_empleado= $_POST['Id_empleado'];
  $CURP= $_POST['CURP'];
  $Nombre= $_POST['Nombre'];
  $Apellido_paterno =$_POST['Apellido_paterno'];
  $Apellido_materno =$_POST['Apellido_materno'];
  $Telefono =$_POST['Telefono'];
  $Fecha_nacimiento= $_POST['Fecha_nacimiento'];
  $Direccion= $_POST['Direccion'];
  $Codigo_postal= $_POST['Codigo_postal'];
  $Email= $_POST['Email'];
  $Constrasenia= $_POST['Constrasenia'];

  $inserta= $conexion->quey("INSERT INTO usuarios VALUES ('$Id_empleado, $CURP, $Nombre, $Apellido_paterno, $Apellido_materno, $Telefono, $Fecha_nacimiento, $Direccion, $Codigo_postal, $Email, $Constrasenia')");

  if ($inserta == true) {
    echo "<center><strong><h4>¡INSERCIÓN EXITOSA!<BR><a href='insertar_dos_tablas.php'>CLICK PARA VERIFICAR</a></strong></h4></center>";    
  }

}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Agregar Auxiliares</title>
	<link rel="icon" href="Imagenes/Medisoft.png">
  <link rel="stylesheet" href="CSS/AgregarAuxiliar.CSS">
</head>
<body>
  <header>
    <h1>Medisoft</h1>
  </header>

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

  <form class="form_agregar" >
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="Id_empleado" class="control_label">Id empleado</label>
          <input type="text" class="control-form" id="Id_empleado" name="Id_empleado" placeholder="Id empleado" required>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="CURP" class="control_label">CURP</label>
          <input type="text" class="control-form" id="curp" name="CURP" placeholder="CURP" required>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="nombre" class="control_label">Nombre(s)</label>
          <input type="text" class="control-form" id="nombre" name="Nombre" placeholder="Nombre(s)" required>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="Apellido_paterno" class="control_label">Apellido paterno</label>
          <input type="text" class="control-form" id="Apellido1" name="Apellido_paterno" placeholder="Apellido paterno" required>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="Apellido_materno" class="control_label">Apellido materno</label>
          <input type="text" class="control-form" id="Apellido1" name="Apellido_materno" placeholder="Apellido materno" required>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="telefono" class="control_label">Telefono</label>
          <input type="text" class="control-form" id="telefono" name="Telefono" placeholder="Telefono" required>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="Fecha_nacimiento" class="control_label">Fecha nacimiento</label>
          <input type="text" class="control-form" id="Apellido1" name="Fecha_nacimiento" placeholder="Fecha_nacimiento" required>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="direccion" class="control_label">Dirección</label>
          <input type="text" class="control-form" id="dire" name="Direccion" placeholder="Dirección" required>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="codigo" class="control_label">Codigo postal</label>
          <input type="text" class="control-form" id="Codigo" name="Codigo_postal" placeholder="Codigo postal" required>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="Email" class="control_label">Email</label>
          <input type="text" class="control-form" id="email" name="Email" placeholder="Email" required>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="contrasena" class="control_label">Contraseña</label>
          <input type="text" class="control-form" id="contrasena" name="Constrasenia" placeholder="Constraseña" required>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
          <div class="pull-right">
            <input name="guardar" type="submit" value="guardar" class="btn btn-default">
          <button id="btnCancelar" class="btn btn-default" type="button">Cancelar</button>
        </div>  
      </div>
    </div>

  </form>
 
</div>

<div class="footer">
  <h2>Contacto: Medisfot@gmail.com</h2>
</div>

</body>
</html>
