<?php
require_once 'models/Pedido.php';


//Controlador de pedidos
class PedidoController{

    public function index(){
       
        require_once 'views/pedido/realizar.php';
    }

    public function add(){

        if(isset($_SESSION['usuario']) && empty($_POST)){
            header('Location:'.base_url."Pedido/index");
        }else if(isset($_POST) && isset($_SESSION['usuario'])){

            $usuario_id = (int) $_SESSION['usuario']->id;
            $c_postal = $_POST['codigo'];
            $localidad = $_POST['localidad'];
            $direccion = $_POST['direccion'];
            $coste = $_POST['envio'];
            $estado = $_POST['estado'];

            $pedido = new Pedido();

            $pedido->setUsuario_id($usuario_id);
            $pedido->setC_postal($c_postal);
            $pedido->setLocalidad($localidad);
            $pedido->setDireccion($direccion);
            $pedido->setCoste($coste);
            $pedido->setEstado($estado);
            $pedido->setPaqueteria('Pendiente');
            $pedido->setPago('pagado');

            $confirmado = $pedido->guardar();

            $linea = $pedido->guardar_lineaPedidos();

            if($confirmado == true && $linea == true){
                
                unset($_SESSION['carrito']);
                unset($_SESSION['total']);
                $_SESSION['confirmado']='Compra realizada satisfactoriamente';
                require_once 'views/carrito/index.php';     
                
            }
         }else{
            $_SESSION['error']= "Es necesario iniciar sesión";
            require_once 'views/carrito/index.php';
        }
    }


    //Visualiza todos los pedidos
    public function ver(){
        

        //Obtiene pedidos solo del usuario
        if(isset($_SESSION['usuario']) && !isset($_SESSION['admin'])){
            $id = $_SESSION['usuario']->id;

            $pedido = new Pedido();
    
            $pedido->setUsuario_id($id);
            $pedidos = $pedido->getAllByUser();
    
            if($pedidos == true){
                require_once 'views/pedido/pedidos.php';
            }

            //Obtiene pedidos del administrador
        }else if (isset($_SESSION['usuario']) && isset($_SESSION['admin'])){

            $pedido = new Pedido();
    
            if(!isset($_GET['filtrar'])){
                $pedidos = $pedido->getAll();
            }else if(isset($_GET['filtrar'])){

                $filtrar = $_GET['filtrar'];

                $pedido->setPaqueteria($filtrar);
                $pedidos = $pedido->getAllByEstatus();
         
            }
           
                require_once 'views/pedido/pedidosAdmin.php';
            

        }else{
            header('Location:'.base_url);
        }
      
    }

    //Visualiza los productos del pedido
    public function detalle(){


        if(isset($_GET['id']) && isset($_SESSION['usuario']) && !isset($_SESSION['admin'])){

           $id = $_GET['id'];
           
           $pedido = new Pedido();
           $pedido->setId($id);
           $productos = $pedido->getOneByUser();
           
            require_once 'views/pedido/detalle.php';
        }else if(isset($_GET['id']) && isset($_SESSION['admin'])){
            $id = $_GET['id'];
           
            $pedido = new Pedido();
            $pedido->setId($id);
            $productos = $pedido->getOneByUser();
//$paqueteria = $productos->fetch_object()->paqueteria;
            require_once 'views/pedido/detalleAdmin.php';
        }else{
            header('Location:'.base_url);
        }

}

    //cambia el estatus del pedido
    public function estatus(){
        
        Utils::isAdmin();
        

        if($_POST){
          
            $id = $_POST['pedido'];
            $estatus = $_POST['estatus'];

            $pedido = new Pedido();
                         
            $pedido->setId($id);
            $pedido->setPaqueteria($estatus);
            $estat = $pedido->updateEstatus();
            
            if($estat == true){
                $_SESSION['confirmado']="Estatus modificado correctamente";
              
            }else{
                $_SESSION['error']="Error al modificar estatus";
            }
            header('Location:'.base_url."Pedido/ver");
        }
}

}

?>