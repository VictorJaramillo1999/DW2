<?php 
    include("ConBD.php");
    $con=conectar();

    $id = $_POST['id'];

    $sql="DELETE FROM reportes WHERE IDPERSONA = '$id'";
    $result=mysqli_query($con,$sql);
    $sql="DELETE FROM asistencia WHERE IDPERSONA = '$id'";
    $result=mysqli_query($con,$sql);
    $sql="DELETE FROM cuentas WHERE IDPERSONA = '$id'";
    $result=mysqli_query($con,$sql);
    $sql="DELETE FROM empleado WHERE IDPERSONA = '$id'";
    $result=mysqli_query($con,$sql);
    $sql="DELETE FROM persona WHERE ID = '$id'";
    $result=mysqli_query($con,$sql);
    echo "eliminado";
?>