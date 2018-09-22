<?php
//conexion con la base de datos y el servidor|
$mysqli = new mysqli('127.0.0.1', 'root', '', 'practica_aplicada');
$mysqli->set_charset("utf8");
//obtenemos los valores del formulario
$nombres = $_POST['nombre'];
$email = $_POST['correo'];
$pass = $_POST['password'];
$tienda = $_POST['sede'];
$perfil = $_POST['perfil'];
$fecha = date("Y-m-d H:i:s");
//Obtiene la longitus de un string
$req = (strlen($nombres) * strlen($email) * strlen($pass) * strlen($tienda) * strlen($perfil) * strlen($fecha)) or die("No se han llenado todos los campos");
//se encripta la contraseña
$contraseñaUser = md5($pass);
$nuevo_correo = "select * from usuario where Email_user='$email'";
$valida = $mysqli->query($nuevo_correo);
if ($valida->num_rows > 0) {
    echo'<script type="text/javascript">
                alert("Error al registrar! - Correo Duplicado - Ingresa otro");
                window.location="http://localhost/PhpPracticaAplicada/index.html"
                </script>';
} else {
    //ingresamos la informacion a la base de datos
    $res = $mysqli->query("INSERT INTO usuario  VALUES('','$nombres','$email','$contraseñaUser','$tienda','$perfil','$fecha')") or die("<h2>Error Guardando los datos</h2>");
    echo'
		<script>
                alert("Registro Exitoso");
			location.href="index.html";
		</script>
	';
}
?>



/* 
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

