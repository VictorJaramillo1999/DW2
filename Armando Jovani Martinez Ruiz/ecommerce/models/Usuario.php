<?php


class usuario{

    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $imagen;

    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id=$id;
    }

    function getNombre(){
        return $this->nombre;
    }
    
    function setNombre($nombre){
        $this->nombre = $nombre;
    }

    function getApellidos(){
        return $this->apellidos;
    }

    function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    function getEmail(){
        return $this->email;
    }

    function setEmail($email){
        $this->email = $email;
    }

    function getPassword(){
        return $this->password;
    }

    function setPassword($passwordSegura){
        $this->password = $passwordSegura;

    }

    function getRol(){
        return $this->rol;
    }

    function setRol($rol){
        $this->rol=$rol;
    }

    function getImagen(){
        return $this->imagen;
    }

    function setImagen($imagen){
        $this->imagen=$imagen;
    }

    //Guarda los datos de un registro
    public function guardar(){
        
        $sql = ("INSERT INTO usuarios VALUES(null,'{$this->getNombre()}','{$this->getApellidos()}','{$this->getEmail()}','{$this->getPassword()}',null,null)");
        $guardar = $this->db->query($sql);

        $result =false;

        if($guardar==true){
           $result=true;
        }

        return $result;
    }

    //Obtiene información para el login
    public function login(){
        
        $result = false;

        $email = $this->email;
        $password = $this->password;
        
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = $this->db->query($sql);

        if($login->num_rows == 1){
            
            $usuario = $login->fetch_object();
            $verify = password_verify($password,$usuario->password);

           
            if ($verify == true) {
                $result = $usuario;
            }
        }

        return $result;
    }
}

?>