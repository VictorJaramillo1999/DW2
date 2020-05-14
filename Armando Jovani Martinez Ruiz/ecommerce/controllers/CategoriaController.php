<?php

require_once 'models/categoria.php';
require_once 'models/Producto.php';
require_once 'helpers/utils.php';

//Controlador usuario
class CategoriaController{

    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        require_once 'views/categoria/index.php';
    }

    //Visualiza los productos por categoría
    public function ver(){

        $id = $_GET['id'];

        $producto = new Producto();
        $producto->setCategoria_id($id);
    
        $productos = $producto->getVer();
     
        
        $categoria = new Categoria();
        $categorias = $categoria->getCategoria($id);
         
        if($productos == true){
            require_once('views/producto/categorias.php');

        }else{

            $_SESSION['error']="No hay productos en esta categoría";
            require_once('views/producto/categorias.php');
        }
     
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
        
                    $_SESSION['confirmado']="Categoría agregada correctamente";
            
                }else{
                    $_SESSION['error']="Error al agregar la categoría";
                }
            }   
            
            header('Location:'.base_url."categoria/index");
            ob_end_flush();
    }

    public function delete(){
        Utils::isAdmin();
        
        if(isset($_GET)){
           
            $id = $_GET['id'];

            $categoria = new Categoria();
            $categoria->setId($id);
            $eliminar = $categoria->delete();

         
            if($eliminar==true){
    
                $_SESSION['confirmado']="Categoría eliminada ";
                
             }else{
                $_SESSION['error'] = "No es posible eliminar la categoría ya que contiene productos";
             }
        }

        header('Location:'.base_url."categoria/index");
    } 

    public function viewUpdate(){

       require_once 'views/categoria/update.php';
    }
    public function update(){

        Utils::isAdmin();

        if(isset($_GET) && isset($_POST)){
            
            $id = $_GET['id'];
            $nombre = $_POST['categoria'];

            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria->setNombre($nombre);

            $update = $categoria->update();
    
            if($update==true){
    
                $_SESSION['confirmado']="Categoría modificada ";
                
             }else{
                $_SESSION['error'] = "Error al modificar la categoría";
             }
    
            header('Location:'.base_url."categoria/index");
        }
       
    }
}
    


?>