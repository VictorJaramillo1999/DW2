<?php
   include_once '../conn.php';
   include_once 'SQL.php';
   include_once 'medico.php';
   
   session_start();
   
   class autocompletar extends conn{
            function buscar($texto){
                $texto="'".$texto."%'";
                
                $res=array();
                $this->conectar();
                $que="SELECT id_paciente,nombres,apellidos FROM pacientes WHERE fk_medico=".$_SESSION['id']." AND nombres LIKE ".$texto.";";
                $objsql= new metodosSQL();
                $array=$objsql->vizualizar($this->conectar(),$que);
                
                if(!empty($array)){
                    foreach ($array as $value) {
                       
                        array_push($res,$value['nombres']." ".$value['apellidos']);
                    }
                }
                return $res;
            }
   }

       $auto = new autocompletar();
       $peticon=$auto->buscar($_GET['nombrepaci']);
     
       echo json_encode($peticon);
   ?>