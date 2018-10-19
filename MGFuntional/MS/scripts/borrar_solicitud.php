<?php

if (isset($_POST['borrar_solicitud'])) {
   
   $id_solicitud=$_POST['id_borrar'];
   Conexion :: abrir_conexion();
   RepositorioSolicitud::eliminar_solicitudes(Conexion::obtener_conexion(),$id_solicitud);
   Conexion::cerrar_conexion();
   Redireccion::redirigir(RUTA_GESTOR_SOLICITUDES);
}
    
