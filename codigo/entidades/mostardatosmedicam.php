<?php


   include_once '../conn.php';
   include_once 'SQL.php';
   include_once 'medico.php';
   $conn = new conn();
   $con=$conn->conectar();
   session_start();
   
   $que="SELECT id_medicamento,nombre,forma_fa,presentacion,concentracion FROM medicamentos where fk_medico=".$_SESSION['id'].";";
   $objsql= new metodosSQL();
   

   $table="";
   $array=$objsql->vizualizar($con,$que);

        foreach ($array as $value) {
            $table=$table . '
            <tr>
            <th>'.$value['id_medicamento'].'</th>
            <th>'.$value['nombre'].'</th>
            <th>'.$value['forma_fa'].'</th>
            <th>'.$value['presentacion'].'</th>
            <th>'.$value['concentracion'].'</th>
            <th class="text-center">
               
                <a href="" class="btn btn-info btn-sm badge-pill" style="width:80px;" role="button" aria-pressed="true"><i class="fas fa-magic"></i></a>
              
            </th>
        </tr>     ';
           
        }
     
        $con->close();
        echo '
        <h5 class="card-title">Datos de tabla Medicamentos</h5>
                                                <table class="table table-hover table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Codigo</th>
                                                        <th>Nombre</th>
                                                        <th>F.Farmaceutica</th>
                                                        <th>Presentacion</th>
                                                        <th>Concentracion</th>
                                                        <th class="text-center">Accion</th>
                                                    </tr>    
                                                </thead>
                                                <tbody> '.$table.'

         
           
        </tbody>

    </table> ';
 ?>
