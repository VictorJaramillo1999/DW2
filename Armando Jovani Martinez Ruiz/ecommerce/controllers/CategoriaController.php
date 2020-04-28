<?php

require_once 'models/categoria.php';
require_once 'helpers/utils.php';

//Controlador usuario
class CategoriaController{

    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        require_once 'views/categoria/index.php';
    }

    public function save(){
            Utils::isAdmin();

            if(isset($_POST)){

                //Recibe los datos
                $nombre= $_POST['categoria'];
               
                $categoria = new Categoria();
    
                $categoria->setNombre($nombre);
    
                $agregar = $categoria->guardar();
    
                if($agregar ==true){
        
                   echo '<script language="javascript">alert("Categoría agregada correctamente");</script>';
                   
                }else{
                    echo '<script language="javascript">alert("Error al agregar categoría");</script>'; 
                }
            }   
            
            header('Location:'.base_url."categoria/index");
            ob_end_flush();
    }

    public function delete(){
        if(isset($_GET)){
           
            $id = $_GET['id'];

            $categoria = new Categoria();
            $categoria->setId($id);
            $eliminar = $categoria->delete();

            if($eliminar==true){
    
                echo '<script language="javascript">alert("Registro completado correctamente");</script>';
                
             }else{
                 echo '<script language="javascript">alert("Correo electrónico repetido");</script>'; 
             }
        }

        header('Location:'.base_url."categoria/index");
    } 

    public function viewUpdate(){

       require_once 'views/categoria/update.php';
    }
    public function update(){

        if(isset($_GET) && isset($_POST)){
            
            $id = $_GET['id'];
            $nombre = $_POST['categoria'];

            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria->setNombre($nombre);

            $update = $categoria->update();
    
            if($update == true){
                echo '<script language="javascript">alert("Categoría modificada correctamente");</script>';
                    
            }else{
                echo '<script language="javascript">alert("Error al modificar categoría");</script>'; 
            }
    
            header('Location:'.base_url."categoria/index");
        }
       
    }
}
    


?>