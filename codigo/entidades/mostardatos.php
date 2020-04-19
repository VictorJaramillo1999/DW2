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
                                            <th>'.$value['nombres'].'</th>
                                            <th>'.$value['apellidos'].'</th>
                                            <th>'.$value['telefono'].'</th>
                                            <th>'.$value['direccion'].'</th>
                                            <th>'.$value['sexo'].'</th>
                                            <th><a href="" >'.$value['email'].'</a></th>
                                            <th>'.$value['edad'].'</th>
                                            <th class="text-center">
                                            
                                                <a href="" class="btn btn-info btn-sm badge-pill" style="width:80px;" role="button" aria-pressed="true"><i class="fas fa-magic"></i></a>
                                            
                                            </th>
                                        </tr>';
           
        }
     
        $con->close();
        echo '
        <h5 class="card-title">Datos de Pacientes</h5>
            <table class="table table-hover table-bordered" style="text-size:12px;">
            <thead>
                <tr>
                    
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Sexo</th>
                    <th>Email</th>
                    <th>Edad</th>

                    <th class="text-center">Accion</th>
                </tr>    
            </thead>
            <tbody>'.$table.'

         
           
        </tbody>

    </table> ';
 ?>



