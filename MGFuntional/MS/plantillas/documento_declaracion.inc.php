<!DOCTYPE html>

<html lang="es">
    <head>
       
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        if (!isset($titulo)||empty($titulo)){
            
            $titulo = "SM";
           
        }
         echo "<title>$titulo</title>";
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link href="<?php echo RUTA_CSS ?>bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo RUTA_CSS ?>estilos.css" rel="stylesheet">
        
        
       
    </head>
    <body>
        
