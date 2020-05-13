<?php


   include_once '../conn.php';
   include_once 'SQL.php';
   include_once 'medico.php';
   $conn = new conn();
   $con=$conn->conectar();
   session_start();
   
   $que="SELECT nombres,apellidos,telefono,direccion,sexo,email,edad FROM pacientes where fk_medico=".$_SESSION['id'].";";
   $objsql= new metodosSQL();
   

   $table="";
   $array=$objsql->vizualizar($con,$que);

        foreach ($array as $value) {
            $table=$table . '
                            <tr>
                            <th>1</th>
                            <th>Juan Diaz</th>
                            <th>Signos de alerta</th>
                            <th>12/04/2020</th>
                            
                            <th class="text-center">
                            
                                <a href="" class="btn btn-info btn-sm badge-pill" style="width:80px;" role="button" aria-pressed="true"><i class="fas fa-magic"></i></a>
                            
                            </th>
                        </tr> ';
           
        }
     
        $con->close();
        echo '
        <h5 class="card-title">Datos de tabla Citas</h5>
                                                <table class="table table-hover table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Codigo</th>
                                                        <th>Nombre del paciente</th>
                                                        <th>observaciones</th>
                                                        <th>fceha de cita</th>
                                                
                                                        <th class="text-center">Accion</th>
                                                    </tr>    
                                                </thead>
            <tbody>'.$table.'

         
           
        </tbody>

    </table> ';
 ?>

