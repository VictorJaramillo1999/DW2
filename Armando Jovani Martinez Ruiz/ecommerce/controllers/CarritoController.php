<?php

require_once 'models/Producto.php';

//Controlador de pedidos
class CarritoController{

    public function index(){
        require_once 'views/carrito/index.php';
    }

    public function add(){
        
        if(isset($_GET['id'])){

            $producto_id = $_GET['id'];
            $flag = false;

            if(isset($_SESSION['carrito'])){    
                foreach($_SESSION['carrito'] as $indice => $elemento){
                
                    $producto = $elemento['producto'];

                    if($elemento['id_producto'] == $producto_id){

                        //Aumentará unidades siempre que sea menor que el stock
                        if($elemento['unidades']<$producto->stock){
                         $_SESSION['carrito'][$indice]['unidades']++;
                        }
                         $flag=true;
                    }
                }
            }
            
            if($flag == false){    
                $productos = new Producto();
                $productos->setId($producto_id);
                $producto = $productos->getOne();

                $_SESSION['carrito'] []= array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" =>1,
                    "producto" => $producto
                );
            }
        }

        header('Location:'.base_url."Carrito/index");
    }

    public function remove(){
        if(isset($_GET['id'])){

            $producto_id = $_GET['id'];

            if(isset($_SESSION['carrito'])){    
                foreach($_SESSION['carrito'] as $indice => $elemento){
                    if($elemento['id_producto'] == $producto_id){
                         $_SESSION['carrito'][$indice]['unidades']--;

                         if($elemento['unidades']==1){
                            unset($_SESSION['carrito'][$indice]);
                            
                         }
                    }
                }
            }
        }

        header('Location:'.base_url."Carrito/index");
    }

    public function deleteAll(){
        unset($_SESSION['carrito']);
        header('Location:'.base_url."Carrito/index");
    }
}

?>