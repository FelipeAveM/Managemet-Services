<?php

include_once 'plantillas/documento_declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
include_once 'plantillas/panel_control_declaracion.inc.php';

switch ($gestor_actual) {
    case'':
        
    if ($_SESSION['perfil']== 'Técnico') {
        
        $cantidad_solicitudes_abiertas = RepositorioSolicitud::contar_solicitudes_abiertas(Conexion::obtener_conexion());
        $cantidad_solicitudes_cerradas = RepositorioSolicitud::contar_solicitudes_cerradas(Conexion::obtener_conexion());
        $cantidad_solicitudes_calificadas = RepositorioSolicitud::contar_solicitudes_calificadas(Conexion::obtener_conexion());
        $cantidad_solicitudes_sin_calificadar = RepositorioSolicitud::contar_solicitudes_sin_calificar(Conexion::obtener_conexion());
        include_once 'plantillas/gestor_generico.inc.php'; 
    
    }else{
       $cantidad_solicitudes_abiertas = RepositorioSolicitud::contar_solicitudes_abiertas_usuario(Conexion::obtener_conexion(), $_SESSION['nombre_usuario']);
        $cantidad_solicitudes_cerradas = RepositorioSolicitud::contar_solicitudes_cerradas_usuario(Conexion::obtener_conexion(), $_SESSION['nombre_usuario']);
        $cantidad_solicitudes_calificadas = RepositorioSolicitud::contar_solicitudes_calificadas_usuario(Conexion::obtener_conexion(), $_SESSION['nombre_usuario']);
        $cantidad_solicitudes_sin_calificadar = RepositorioSolicitud::contar_solicitudes_sin_calificar_usuario(Conexion::obtener_conexion(), $_SESSION['nombre_usuario']);
        include_once 'plantillas/gestor_generico.inc.php'; 
       
    }
    

        
        break;
    case'solicitudes':
        if ($_SESSION['perfil'] == 'Líder de tienda') {
            $array_solicitudes = RepositorioSolicitud :: obtener_solicitudes_usuario_fecha_descendente(Conexion::obtener_conexion(), $_SESSION['nombre_usuario']);
        } else {
            $array_solicitudes = RepositorioSolicitud :: obtener_solicitudes_usuario_fecha_descendente_abiertas(Conexion::obtener_conexion());
        }



        include_once 'plantillas/gestor_solicitudes.inc.php';
        break;


    case'estadistica':
        // $usuarios_tecnicos=RepositorioUsuario::obtener_todos_usuarios_tecnicos(Conexion::obtener_conexion());
        include_once 'plantillas/gestor_estadistica.inc.php';
        break;
    case'calificacion':
        if ($_SESSION['perfil'] == 'Líder de tienda' || $_SESSION['perfil'] == 'Supervisor') {
            $array_solicitudes_cerradas = RepositorioSolicitud :: obtener_solicitudes_usuario_cerradas(Conexion::obtener_conexion(), $_SESSION['nombre_usuario']);
            include_once 'plantillas/gestor_calificacion.inc.php';
            break;
        }else{
           ?>
<div class="alert-danger">
    <h3 class="alert-danger">No tienes permisos</h3>
</div>
<?php
        }
}
include_once 'plantillas/documento_cierre.inc.php';
include_once 'plantillas/panel_control_cierre.inc.php';
