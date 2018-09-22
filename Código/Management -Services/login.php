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

$email = $_POST['email'];
$pass = $_POST['password'];
//Obtiene la longitus de un string
$req = (strlen($email) * strlen($pass) ) or die("No se han llenado todos los campos");

//realizamos consulta en la base de datos
$res = $mysqli->query("SELECT Email_user,Password_user  WHERE Email_user = '”.mysql_real_escape_string($email).“‘ and “
         . “Password_user='”.mysql_real_escape_string($pass)");

echo'
		<script>
			location.href="user.html";
		</script>
	'
?>