<?php
include_once 'app/Usuario.inc.php';

class Redireccion{
    public static function redirigir ($url){
        header('Location:' .$url ,true, 301);
        exit();
        
    }
}
