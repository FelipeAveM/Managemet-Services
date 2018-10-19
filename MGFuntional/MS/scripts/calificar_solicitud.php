<?php

if (isset($_POST['calificar_solicitud'])) {
   
   $id_solicitud=$_POST['id_calificar'];
   $calificacion=$_POST['calificacion'];
   Conexion :: abrir_conexion();
   RepositorioSolicitud::calificar_solicitud(Conexion::obtener_conexion(),$id_solicitud,$calificacion);
   Conexion::cerrar_conexion();
   Redireccion::redirigir(RUTA_GESTOR_CALIFICACIONES);
}
    
