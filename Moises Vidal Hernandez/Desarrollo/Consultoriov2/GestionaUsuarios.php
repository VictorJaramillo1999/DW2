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
  <title>Gestion Medicos</title>
	<link rel="icon" href="Imagenes/Medisoft.png">
  <link rel="stylesheet" href="CSS/EstilosGestionUsuarios.CSS">
</head>
<body>

<div class="header">
  <h1>Medisoft</h1>
</div>

<div class="topnav">
  <a href="cerrar_sesion.php" style="float:right">Cerrar Sesión</a>
	<div class="nav">
  <a href="RegresaMenu.php">Menu Principal</a>
  </div>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <div class="TituloG">
        <h2>Bienvenido a la gestión de medicos</h2>  
      </div>
      <div class="TablaContenido">
        <table class="tablamedicos">
          <thead>
            <th>ID medico</th>
            <th>Cedulae</th>
            <th>Especialidad</th>
            <th>Facultad</th>
            <th> <a href="NuevoMedico.php">
               <button type="button"  class="btnNuevo">Nuevo</button>
            </a></th>
          </thead>


          <?php 
            include "conexion.php";
            $sentencia="SELECT * FROM medicos";
            $resultado=mysql_query($sentencia);
            while ($filas = mysql_fetch_assoc($resultado)) {
              echo "<tr>";
                echo "<tr>"; echo $filas['Id_medico']; echo "</tr>";
                echo "<tr>"; echo $filas['Cedula']; echo "</tr>";
                echo "<tr>"; echo $filas['Especialidad']; echo "</tr>";
                echo "<tr>"; echo $filas['Fac_egreso']; echo "</tr>";
              echo "</tr>";
            }
            ?>
        </table>
      </div>
	</div>
      
    
  </div>
 
</div>

<div class="footer">
  <h2>Contacto: Medisfotf@gmail.com</h2>
</div>

</body>
</html>
