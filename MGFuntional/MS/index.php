<?php

include_once 'app/Conexion.inc.php';
include_once 'app/config.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/solicitud.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioSolicitud.inc.php';


include_once 'app/ValidadorRegistro.inc.php';
include_once 'app/Redireccion.inc.php';


$componentes_url = parse_url($_SERVER['REQUEST_URI']);
$ruta = $componentes_url['path'];

$partes_ruta = explode('/', $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);

$ruta_elegida = 'vistas/404.php';

if ($partes_ruta[0] == 'blog') {
    if (count($partes_ruta) == 1) {
        $ruta_elegida = 'vistas/home.php';
    } else if (count($partes_ruta) == 2) {
        switch ($partes_ruta[1]) {
            case'login':
                $ruta_elegida = 'vistas/login.php';
                break;
            case'logout':
                $ruta_elegida = 'vistas/logout.php';
                break;
            case 'registro':
                $ruta_elegida = 'vistas/registro.php';
                break;
            case 'registroSolicitud':
                $ruta_elegida = 'vistas/registroSolicitud.php';
                break;
            case 'grafica':
                $ruta_elegida = 'vistas/grafica.php';
                break;
            case 'grafica_dos':
                $ruta_elegida = 'vistas/grafica_dos.php';
                break;
            case 'grafica_tres':
                $ruta_elegida = 'vistas/grafica_tres.php';
                break;
            case 'grafica_cuatro':
                $ruta_elegida = 'vistas/grafica_cuatro.php';
                break;
            case 'gestor':
                $ruta_elegida = 'vistas/gestor.php';
                $gestor_actual = '';
                break;
            case 'borrar_solicitud':
                $ruta_elegida = 'scripts/borrar_solicitud.php';
               
                break;
            case 'calificar_solicitud':
                $ruta_elegida = 'scripts/calificar_solicitud.php';
               
                break;
            case 'editar_solicitud':
                $ruta_elegida = 'vistas/editar_solicitud.php';
               
                break;
            case 'perfil':
                $ruta_elegida = 'vistas/perfil.php';
               
                break;
            case 'inicio':
                $ruta_elegida = 'vistas/inicio.php';
               
                break;
        }
    } else if (count($partes_ruta) == 3) {

        if ($partes_ruta[1] == 'registro_correcto') {
            $nombre = $partes_ruta[2];
            $ruta_elegida = 'vistas/Registro_correcto.php';
        }

        if ($partes_ruta[1] == 'cierre_solicitud') {
            $id_solicitud = $partes_ruta[2];
            Conexion::abrir_conexion();

            $solicitud = RepositorioSolicitud::obtener_solicitudes_por_id(Conexion::obtener_conexion(), $id_solicitud);

            if ($solicitud != null) {
                $solicitudes_azar = RepositorioSolicitud::obtener_solicitudes_al_azar(Conexion::obtener_conexion(), 2);
                $ruta_elegida = 'vistas/cierre_solicitud.php';
            }
        }

        if ($partes_ruta[1] == 'gestor') {
            
            switch ($partes_ruta[2]) {
                case 'solicitudes':
                    $gestor_actual = 'solicitudes';
                    $ruta_elegida = 'vistas/gestor.php';
                    break;
                case 'estadistica':
                    $gestor_actual = 'estadistica';
                    $ruta_elegida = 'vistas/gestor.php';
                    break;
                case 'calificacion':
                    $gestor_actual = 'calificacion';
                    $ruta_elegida = 'vistas/gestor.php';
                    break;
            }
        }
    }
}



include_once $ruta_elegida;
