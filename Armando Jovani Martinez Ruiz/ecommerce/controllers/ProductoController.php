<?php

require_once 'models/Producto.php';
require_once 'models/categoria.php';
//Controlador de productos
class ProductoController{

    // principal prodcutos destacados
    public function index(){
        $producto = new Producto();
        $productos = $producto->getRand(8);

        $categoria = new Categoria();
        $categorias = $categoria->getAll();


        //renderización de la vista
        require_once 'views/producto/destacados.php';
    }

    // ventana principal de la gestión de productos
    public function gestion(){
        Utils::isAdmin();

        $producto = new Producto();

        //Si no recibe una categoria en particular manda todos los productos.
        if(!isset($_GET['ordenar'])){
            $productos = $producto->getAll();

        }else if(isset($_GET['ordenar'])){

            $categoria_ordenar = $_GET['ordenar'];
            $producto->setCategoria_id($categoria_ordenar);
            $productos = $producto->getVer();
        }
      
        require_once 'views/producto/gestion.php';
    }
     
    public function crear(){
        Utils::isAdmin();
        $edit = false;
        require_once 'views/Producto/crear.php';
    }

    //guarda nuevas categorias
    public function save(){
        if(isset($_POST)){

            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $desc_corta = $_POST['desc_corta'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];
            $categoria_id = $_POST['categoria'];
            
            //Guardar imagen
            $file = $_FILES['imagen'];
            $filename = $file['name'];
            $type = $file['type'];
            
            
            $producto = new Producto();

            $producto->setCategoria_id($categoria_id);
            $producto->setNombre($nombre);
            $producto->setDesc_corta($desc_corta);
            $producto->setDescripcion($descripcion);
            $producto->setPrecio($precio);
            $producto->setStock($stock);

            //Si la imagen esta vacia (solo el caso de editar puede estar vacia) ejecuta la edición de datos con la imagen anterior
            if($file['name']==''){
                
                    $id = (int) $_GET['id'];

                    $producto->setId($id);
                    $producto1 = $producto->getOne();
    
                    $imagen = $producto1->imagen;
                    $producto->setImagen($imagen);  

                    $update = $producto->edit();
    
                      if($update == true){
    
                        $_SESSION['confirmado']="Producto modificado";
        
                      }else{
                          $_SESSION['error']="Error al modificar el producto";
                      }   
    
                   header('Location:'.base_url."Producto/gestion");
                
            }

            //Si se modifico la imagen o se creo un producto nuevo ejecuta la funcion editar o guardar segun sea el caso
            if($type == "image/jpg" || $type == "image/jpeg" || $type=="image/png"){
                
                if(!is_dir("uploads/images")){
                   mkdir("uploads/images",0777,true);
                }

                move_uploaded_file($file['tmp_name'],"uploads/images/".$filename);
                $producto->setImagen($filename);

                if(isset($_GET['id'])){

                    $id = (int) $_GET['id'];

                    $producto->setId($id);
                    
                    $update = $producto->edit();
    
                      if($update == true){
    
                        $_SESSION['confirmado']="Producto modificado";
        
                      }else{
                          $_SESSION['error']="Error al modificar el producto";
                      }   
    
                   header('Location:'.base_url."Producto/gestion");
                }else{

                       $save = $producto->guardar();
         
                           if($save==true){

                                $_SESSION['confirmado']="Producto agregado";
         
                            }else{
                                $_SESSION['error']="Error al agregar el producto";
                            }
                    }
            }else{
                $_SESSION['error']="Error al cargar la imagen";

            }
            
         header('Location:'.base_url."Producto/gestion");
        }
    }

    public function edit(){
        $edit = true;

        $id = $_GET['id'];

        $producto = new Producto();
        $producto->setId($id);
        $pro = $producto->getOne();

        require_once 'views/producto/crear.php';
    }

    public function delete(){
        Utils::isAdmin();

        if(isset($_GET['id'])){
           
            $id = $_GET['id'];

            $producto = new Producto();
            $producto->setId($id);

            $producto->delete();

            if($producto == true ){
                $_SESSION['confirmado']="Producto eliminado";
            }else{
                $_SESSION['error']="Error al eliminar el producto";
            }
        }

        header('Location:'.base_url."Producto/gestion");
    }

    //Visualiza el producto de manera individual
    public function individual(){
        $id = $_GET['id'];

        $producto = new Producto();
        
        $productos = $producto->getRand(3);
        
        $producto->setId($id);
        $pro = $producto->getOne();

        require_once 'views/Producto/individual.php';
    }

    //realiza la busqueda de productos
    public function busqueda(){

        if(isset($_POST['buscar'])){
            $texto = $_POST['buscar'];

            $producto = new Producto();
            $productos = $producto->getBusqueda($texto);
    
            if($productos != false){
    
               require_once 'views/Producto/busqueda.php';
            }else{
                $_SESSION['error']="No se encontraron productos con la busqueda: ".$texto;
                require_once 'views/Producto/busqueda.php';
            }
        }else{
            header('Location:'.base_url);
        }

    }

}

?>