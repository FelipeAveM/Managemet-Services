    <?php
    
include_once 'RepositorioUsuario.inc.php';
class ValidadorRegistro{
    
    private $aviso_inicio;
    private $aviso_cierre;
    
    private $nombre;
    private $correo;
    private $clave;
    
    
   
    private $error_nombre;
    private $error_correo;
    private $error_clave1;
    private $error_clave2;
           
    
    public function __construct($nombre,$correo,$clave1,$clave2,$conexion) {
        $this ->aviso_inicio = "<br><div class= 'alert alert-danger' role='alert'>";
        $this ->aviso_cierre = "</div>";
        
        
        $this -> nombre = "";
        $this -> correo = "";
        $this -> clave = "";
        
        
        $this -> error_nombre = $this -> validar_nombre($conexion,$nombre);
        $this -> error_correo = $this -> validar_correo($conexion,$correo);
        $this -> error_clave1 = $this -> validar_clave1($clave1);
        $this -> error_clave2 = $this -> validar_clave2($clave1,$clave2);
        
        if ($this -> error_clave1 === "" && $this -> error_clave2== ""){
            $this -> clave = $clave1;
        }
        
    }
    
    private function variable_iniciada ($variable) {
        if (isset($variable) && !empty($variable)){
            return true;
        }else{
        return false;
    }
    }
    private function validar_nombre ($conexion,$nombre) {
        if (!$this -> variable_iniciada($nombre)){
            return "Escribe un nombre de Usuario Alkosto/Ktronix.";
        }
        else{
        $this -> nombre =$nombre; 
     }
     
     if (strlen($nombre) < 6) {
         return "Usuario Alkosto/Ktronix debe contener mas de 6 caracteres. ";
     }  
     if (strlen($nombre) > 20) {
         return "Elnombre no puede ocupar mas de 20 caracteres.";
     }  
     if (RepositorioUsuario:: nombre_existe($conexion,$nombre)) {
         return "Este nombre de usuario ya se encuentra en uso, prueba con otro nombre.";
         
     }
     
     return"";
   }
   
   private function validar_correo($conexion,$correo) {
        if (!$this-> variable_iniciada($correo)){
            return "Debes proporcionar un correo para el dominio  Alkosto/Ktronix.";
        }else{
       $this->correo =$correo;
     }
     if (RepositorioUsuario:: correo_existe($conexion,$correo)) {
         return "Este email ya esta en uso, Por favor, pruebe otro email o <a href='#'> Recuperar contraseña </a>";
         
     }
     return "";
   }
   private function validar_clave1 ($clave1) {
        if (!$this-> variable_iniciada($clave1)){
            return "Debes proporcionar una contraseña.";
        }
     return "";
   }
   private function validar_clave2 ($clave1,$clave2) {
       if (!$this -> variable_iniciada($clave1)){
            return "Primero debes proporcionar la contraseña.";
        }
        if (!$this -> variable_iniciada($clave2)){
            return "Debes repetir contraseña.";
        }
        if ($clave1 !==$clave2) {
            return "No coinciden las contraseñas ";
        }
     return "";
   }
  
   
   public function obtener_nombre() {
       return $this -> nombre;
       
   }
   
   
   
   public function obtener_correo() {
       return $this -> correo;
       
   }
   public function obtener_clave() {
       return $this -> clave;
       
   }
   public function obtener_error_nombre() {
       return $this -> error_nombre;
       
   }
    public function obtener_error_correo() {
       return $this -> error_correo;
       
   }
   public function obtener_error_clave1() {
       return $this -> error_clave1;
       
   }
   public function obtener_error_clave2() {
       return $this -> error_clave2;
       
   }
   
   public function mostrar_nombre (){
       if ($this ->nombre !== "") {
           echo 'value= "'. $this -> nombre . '"';
       }
   }
   public function mostrar_error_nombre(){
       if ($this-> error_nombre !== "") {
           echo $this -> aviso_inicio . $this -> error_nombre . $this -> aviso_cierre;
       }
   }
   
   public function mostrar_correo (){
       if ($this ->correo !== "") {
           echo 'value= "'. $this -> correo . '"';
       } 
}
public function mostrar_error_correo(){
       if ($this-> error_correo !== "") {
           echo $this -> aviso_inicio . $this -> error_correo . $this -> aviso_cierre;
       }
   }
   public function mostrar_error_clave1(){
       if ($this-> error_clave1 !== "") {
           echo $this -> aviso_inicio . $this -> error_clave1 . $this -> aviso_cierre;
       }
   }
   public function mostrar_error_clave2(){
       if ($this-> error_clave2 !== "") {
           echo $this -> aviso_inicio . $this -> error_clave2 . $this -> aviso_cierre;
       }
   }
   public function registro_valido() {
       if ($this -> error_nombre === "" && $this -> error_correo === "" && $this -> error_clave1 === "" &&  $this -> error_clave2 === "" ){
          
           return true;
       }else{
           return false;
       }
   }
  
}