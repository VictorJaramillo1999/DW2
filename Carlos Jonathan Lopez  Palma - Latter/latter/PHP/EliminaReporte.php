<?php 
    include("ConBD.php");
    $con=conectar();

    $id = $_POST['id'];
    $desc = $_POST['desc'];
    $fecha = $_POST['fecha'];

    $sql="DELETE FROM reportes WHERE IDPERSONA = '$id' AND DESCRIPCION = '$desc' AND FECHA = '$fecha'";
    $result=mysqli_query($con,$sql);
    if($result==true){
        echo 'true';
    } else {
        echo 'false';
    }
?>