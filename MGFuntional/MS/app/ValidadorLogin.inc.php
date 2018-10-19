<?php

include_once 'RepositorioUsuario.inc.php';


class ValidadorLogin {

    private $usuario;
    private $error;

    public function __construct($correo,$clave,$conexion) {
        
        
        $this -> error = "";

        if (!$this -> variable_iniciada($correo) ||  !$this -> variable_iniciada($clave)) {
            
            $this -> usuario = null;
            $this -> error = "Debes introducir tu email y contraseña";
        } else {
            
            $this -> usuario = RepositorioUsuario:: obtener_usuario_correo ($conexion,$correo);
            
            if (is_null($this -> usuario) || !password_verify($clave,$this -> usuario -> obtenerPassword())) {
                
            $this -> error = "Datos incorrectos"; 
            }
            
            
             
        }
        
    }
    

    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function obtener_usuario(){
        return $this -> usuario;
    }
    public function obtener_error(){
        return $this -> error;
    }
    
    public function mostrar_error(){
        if ($this -> error !== '') {
            echo "<br><div class ='alert alert-danger' role ='alert'>";
            echo $this -> error;
            echo "</div><br>";
        }
    }

}
