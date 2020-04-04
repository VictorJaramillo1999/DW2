<?php
	include("ConBD.php");
    $con=conectar();

    $query="SELECT p.ID, p.NOMBRE, p.APELLIDOPA, p.APELLIDOMA, r.DESCRIPCION, r.FECHA, r.HORA FROM reportes r INNER JOIN persona p ON r.IDPERSONA = p.ID";
    $result=mysqli_query($con,$query);
    while ($mostrar = mysqli_fetch_array($result)) {
?>
        <tr class="fila">
            <td class="tdm"><?php echo $mostrar['ID'] ?></td>
            <td class="td"><?php echo $mostrar['NOMBRE']." ".$mostrar['APELLIDOPA']." ".$mostrar['APELLIDOMA'] ?></td>
            <td class="treport"><?php echo $mostrar['DESCRIPCION'] ?></td>
            <td class="td"><?php echo $mostrar['FECHA'] ?></td>
            <td class="td"><?php echo $mostrar['HORA'] ?></td>
            <td><button class="btn btn-danger fas fa-trash-alt"></button></td>
        </tr>
<?php
    }
?>
    
