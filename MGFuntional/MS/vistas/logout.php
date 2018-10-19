
<?php

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioSolicitud.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/config.inc.php';
$titulo = "SM Solicitudes Mantenimiento";
include_once 'plantillas/documento_declaracion.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'plantillas/navbar.inc.php';
include_once 'plantillas/documento_cierre.inc.php';

ControlSesion::cerrar_sesion();
Redireccion::redirigir(SERVIDOR);
  


