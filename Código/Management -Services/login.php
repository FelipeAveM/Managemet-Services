<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//conexion con la base de datos y el servidorx|
$mysqli = new mysqli('127.0.0.1', 'root', '', 'practica_aplicada');
$mysqli->set_charset("utf8");
//obtenemos los valores del formulario
$email = $_POST['correo'];
$pass = $_POST['password'];
//se encripta la contraseña
 $pass_c = md5($pass);  
//Obtiene la longitud de un string
$req = (strlen($email) * strlen($pass) ) or die("No se han llenado todos los campos");
//realizamos consulta en la base de datos

$nuevo = "select * from usuario where Email_user = '$email' AND Password_user = '$pass_c'";
 
      
       $valida = $mysqli->query($nuevo);
        if( $valida->num_rows == 0) 
        {
            echo'<script type="text/javascript">
                alert("Usuario o Contraseña Incorrecta");
                window.location="http://localhost/PhpPracticaAplicada/index.html"
                </script>';
        }
 
         else{
             header("location:User.html");
        }

?>
