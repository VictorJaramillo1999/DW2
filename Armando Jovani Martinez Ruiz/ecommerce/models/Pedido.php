<?php

require_once 'config/DB.php';

class Pedido{

    private $id;
    private $usuario_id;
    private $c_postal;
    private $localidad;
    private $direccion;
    private $estado;
    private $fecha;
    private $hora;
    private $paqueteria;
    private $pago;

    private $db;

    public function __construct(){
       $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id = $id;
    }

    function getUsuario_id(){
        return $this->usuario_id;
    }

    function setUsuario_id($usuario_id){
        $this->usuario_id = $usuario_id;
    }

    function getC_postal(){
        return $this->c_postal;
    }

    function setC_postal($c_postal){
        $this->c_postal = $this->db->real_escape_string($c_postal);
    }

    function getLocalidad(){
        return $this->localidad;
    }

    function setLocalidad($localidad){
        $this->localidad = $this->db->real_escape_string($localidad);
    }
    
    function getDireccion(){
        return $this->direccion;
    }

    function setDireccion($direccion){
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    function getCoste(){
        return $this->coste;
    }

    function setCoste($coste){
        $this->coste = $this->db->real_escape_string($coste);
    }

    function getEstado(){
        return $this->estado;
    }

    function setEstado($estado){
        $this->estado = $this->db->real_escape_string($estado);
    }

    function getFecha(){
        return $this->fecha;
    }

    function setFecha($fecha){
        $this->fecha = $this->db->real_escape_string($fecha);
    }

    function getHora(){
        return $this->hora;
    }

    function setHora($Hora){
        $this->hora = $this->db->real_escape_string($hora);
    }
    function getPaqueteria(){
        return $this->paqueteria;
    }

    function setPaqueteria($paqueteria){
        $this->paqueteria = $this->db->real_escape_string($paqueteria);
    }
    function getPago(){
        return $this->pago;
    }

    function setPago($pago){
        $this->pago = $this->db->real_escape_string($pago);
    }



  // Obtiene todos los pedidos
  public function getAllByUser(){
    $result = false;

    $id = $this->usuario_id;
    $sql= "SELECT * FROM pedidos WHERE usuario_id =$id ORDER BY id DESC";
    $consulta = $this->db->query($sql);

    if($consulta==true){
       $result = $consulta;
    }
    
    return $result;
}

 //guarda los productos
public function guardar(){
    $result =false;    

    $sql = "INSERT INTO pedidos VALUES(null,{$this->getUsuario_id()},{$this->getC_postal()},'{$this->getLocalidad()}','{$this->getDireccion()}',{$this->getCoste()},'{$this->getEstado()}',CURDATE(),CURTIME(),'{$this->getPaqueteria()}','{$this->getPago()}')";

    $guardar = $this->db->query($sql);

    if($guardar==true){
       $result=true;
    }

    return $result;
}


//Guardas las llaves pk del pedido y los productos de ese pedido
public function guardar_lineaPedidos(){

    
    $result =false;

    $sql = " SELECT LAST_INSERT_ID() AS 'pedido'";

    $consulta = $this->db->query($sql);

    $pedido = $consulta->fetch_object()->pedido;

    foreach($_SESSION['carrito'] as $indice => $elemento){

        $producto = $elemento['producto'];

        $sql = "INSERT INTO lineas_pedidos VALUES(null,{$pedido},{$producto->id},{$elemento['unidades']})";

        $guardar = $this->db->query($sql);
    }

    if($guardar == true){
       $result= true;
    }else{
        $result = false;
    }

  return $result;
}

public function getOneByUser(){
    
    $id =$this->id;

    $sql = "SELECT P.*, l.*,pe.* FROM productos p INNER JOIN lineas_pedidos l ON p.id=l.producto_id INNER JOIN pedidos pe ON pe.id = l.pedido_id WHERE l.pedido_id = $id";

    $consulta = $this->db->query($sql);

     return $consulta; 
}

//Obtiene absolutamente todos los pedidos
public function getAll(){
    $result = false;

    $id = $this->usuario_id;
    $sql= "SELECT * FROM pedidos ORDER BY id DESC";
    $consulta = $this->db->query($sql);

    if($consulta==true){
       $result = $consulta;
    }
    
    return $result;
}

//Obtiene el precio total del envio por pedido
public function getPrecioPedido($id){

    $result =  false;
  

    $sql="SELECT SUM(p.precio * l.unidades) AS 'total' FROM lineas_pedidos l INNER JOIN productos p ON p.id = l.producto_id  WHERE l.pedido_id = $id";  
    $total = $this->db->query($sql);

        if($total == true){
          $result = $total->fetch_object()->total; 
        }

       
    $sql="SELECT coste FROM pedidos ";
    $coste = $this->db->query($sql);

        if($coste == true){
           $coste = $coste->fetch_object()->coste;
           $result = $coste + $result;
        }

        return $result;
}

public function updateEstatus(){

    $id_pedido = $this->id;
    $estatus = $this->paqueteria;

    $sql = "UPDATE pedidos SET paqueteria='$estatus' WHERE id=$id_pedido";
    $actualizar = $this->db->query($sql);


    if($actualizar == true){
          
       return true; 
    }else{
          return false;
    }
}


//Obtiene los pedidos de acuerdo al estatus de la paqueteria
public function getAllByEstatus(){
    $result = false;

    $estatus = $this->paqueteria;


    $sql= "SELECT * FROM pedidos WHERE paqueteria='$estatus' ORDER BY id DESC ";
    $consulta = $this->db->query($sql);

    if($consulta==true){
       $result = $consulta;
    }
    
    return $result;
}

}
?>