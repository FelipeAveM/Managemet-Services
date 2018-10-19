
<!– Esta es la clase Usuario, seutiliza para la creacion de un usuario en la base de datos. –>

<?php
class Usuario{
    
    private $id;
    private $nombre;
    private $correo;
    private $password;
    private $fecha_registro;
    private $activo;
    private $perfil;
    private $tienda;
    
    public function __construct($id,$nombre,$correo,$password,$fecha_registro,$activo,$perfil,$tienda){
        $this-> id =$id;
        $this-> nombre=$nombre;
        $this-> correo=$correo;
        $this-> password=$password;
        $this-> fecha_registro=$fecha_registro;
        $this-> activo=$activo;
        $this-> perfil=$perfil;
        $this-> tienda=$tienda;
    }
    //get
    
    public function obtenerTienda(){
        return $this->tienda;
    }
    public function obtenerPerfil(){
        return $this->perfil;
    }
    public function obtenerId(){
        return $this->id;
    }
    public function obtenerNombre(){
        return $this->nombre;
    }
    public function obtenerCorreo(){
        return $this->correo;
    }
    public function obtenerPassword(){
        return $this->password;
    }
    public function obtenerFecharegistro(){
        return $this->fecha_registro;
    }
    public function obtenerActivo(){
        return $this->activo;
    }
    
    //set
    
     public function cambiarPerfil($perfil){
        $this->nombre=$perfil;
        
    }
     public function cambiarTienda($tienda){
        $this->nombre=$tienda;
        
    }
    public function cambiarNombre($nombre){
        $this->nombre=$nombre;
        
    }
    public function cambiarCorreo($correo){
        $this->correo=$correo;
        
    }
    public function cambiarPassword($password){
        $this->password=$password;
        
    }
    public function cambiarActivo($activo){
        $this->activo=$activo;
        
    }
    
}
