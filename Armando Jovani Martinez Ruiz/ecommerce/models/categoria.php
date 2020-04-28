<?php

require_once 'config/DB.php';

class Categoria{

    public $id;
    public $nombre;

    private $db;
    public function __construct(){
       $this->db =Database::connect();
    }

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id = $id;
    }

    function getNombre(){
        return $this->nombre;
    }

    function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }


    public function getAll(){
        
        $sql ="SELECT * FROM categorias";
        $categorias = $this->db->query($sql);

        return $categorias;
    }

    public function guardar(){

        $sql= "INSERT INTO categorias VALUES (null,'{$this->getNombre()}')";
        $guardar = $this->db->query($sql);

        $result = false;
        if($guardar == true){
           $result = true;
        }

        return $result;
    }

    public function delete(){

        $id= $this->id;
        $sql = "DELETE FROM categorias WHERE id = $id";
        $delete = $this->db->query($sql);

        $result=false;
        if($delete == true){
           $result=true;
        }

        return $result;
    }

    public function getCategoria($id){

        $result=false;
        
        $sql="SELECT * FROM categorias WHERE id=$id";
        $consulta = $this->db->query($sql);

      
        if($consulta->num_rows == 1){
           $result = $consulta->fetch_object();
        }
        
        return $result;
    }

    public function update(){
        $result = false;
        $id = $this->id;
        $nombre = $this->nombre;

        $sql= "UPDATE categorias SET nombre='$nombre' WHERE id=$id";
        $update = $this->db->query($sql);

        if($update == true){
           $result = true;
        }
        return $result;
    }
}
?>