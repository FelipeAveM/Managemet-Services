<?php

// informacion de labase de datos 

define('NOMBRE_SERVIDOR','localhost');
define('NOMBRE_USUARIO','root');
define('PASSWORD','');
define('NOMBRE_BD','sm');

// rutas de la web
define("SERVIDOR", "http://localhost/blog");

define("RUTA_REGISTRO",SERVIDOR."/registro");

define("RUTA_REGISTRO_CORRECTO",SERVIDOR."/registro_correcto");

define("RUTA_LOGIN",SERVIDOR."/login");

define("RUTA_LOGOUT",SERVIDOR."/logout");

define("RUTA_SESION",SERVIDOR."/Usuario_iniciado");

define("RUTA_CIERRE_SOLICITUD",SERVIDOR."/cierre_solicitud");

define("RUTA_REGISTRO_SOLICITUD",SERVIDOR."/registroSolicitud");



define("RUTA_GESTOR",SERVIDOR."/gestor");

define("RUTA_INICIO",SERVIDOR."/inicio");

define("RUTA_BORRAR_SOLICITUD",SERVIDOR."/borrar_solicitud");

define("RUTA_CALIFICAR_SOLICITUD",SERVIDOR."/calificar_solicitud");

define("RUTA_GESTOR_SOLICITUDES",RUTA_GESTOR."/solicitudes");

define("RUTA_GESTOR_ESTADISTICAS",RUTA_GESTOR."/estadistica");

define("RUTA_GESTOR_CALIFICACIONES",RUTA_GESTOR."/calificacion");

define("RUTA_EDITAR_SOLICITUD",SERVIDOR."/editar_solicitud");

define("RUTA_GRAFICA",SERVIDOR."/grafica");

define("RUTA_GRAFICA_DOS",SERVIDOR."/grafica_dos");

define("RUTA_GRAFICA_TRES",SERVIDOR."/grafica_tres");

define("RUTA_GRAFICA_CUATRO",SERVIDOR."/grafica_cuatro");


define("RUTA_PERFIL",SERVIDOR."/perfil");



// recursos
define("RUTA_CSS", SERVIDOR. "/css/");

define("RUTA_JS", SERVIDOR. "/js/");

define("DIRECTORIO_RAIZ", realpath(__DIR__."/.."));

 