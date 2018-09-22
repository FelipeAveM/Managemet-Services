<?php
//capturamos los datos del fichero subido    

    $type=$_FILES['img_up']['type'];
    $tmp_name = $_FILES['img_up']["tmp_name"];
    $name = $_FILES['img_up']["name"];
    //Creamos una nueva ruta (nuevo path)
    //Así guardaremos nuestra imagen en la carpeta "images"
    $nuevo_path="images/".$name;
    //Movemos el archivo desde su ubicación temporal hacia la nueva ruta
    # $tmp_name: la ruta temporal del fichero
    # $nuevo_path: la nueva ruta que creamos
    move_uploaded_file($tmp_name,$nuevo_path);
    //Extraer la extensión del archivo. P.e: jpg
    # Con explode() segmentamos la cadena de acuerdo al separador que definamos. En este caso punto (.)
    $array=explode('.',$nuevo_path);
    # Capturamos el último elemento del array anterior que vendría a ser la extensión
    $ext= end($array);

    //conexion con la base de datos y el servidorx|
    $mysqli = new mysqli('127.0.0.1', 'root', '', 'practica_aplicada');
    $mysqli->set_charset("utf8");
    //obtenemos los valores del formulario

    //ingresamos la informacion a la base de datos
    $res = $mysqli->query("UPDATE USUARIO SET ruta_foto='".$name."'") or die("<h2>Error Guardando los datos</h2>");


  header("Location: User.php");

?>
