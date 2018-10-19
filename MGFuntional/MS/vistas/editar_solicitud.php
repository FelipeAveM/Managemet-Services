<?php
include_once 'app/Conexion.inc.php';
include_once 'app/config.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/solicitud.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioSolicitud.inc.php';
include_once 'app/Escritorsolicitud.inc.php';
include_once 'app/EscritorEntradas.inc.php';

// Titulo para que se muestre en la pestaña del navegador 
Conexion::obtener_conexion();





$titulo = "Editor de solicitudes ";
include_once 'plantillas/documento_declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>


<div class="container"><
    <div class="jumbotron">
        <h1 class="text-center">Cierre De Solicitud</h1>

    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-left">
            <div class="panel-heading">
                <h3 class="panel-title text-left">Para que puedas cerrar la solicitud,  <?php echo '' . $_SESSION['nombre_usuario']; ?>.! 
                    se requiere que ...
                </h3>
            </div>
            <div class="panel panel-default">
                <form class="form-editar-solicitud" method="post" action="<?php echo RUTA_EDITAR_SOLICITUD; ?>">
                    <?php
                    if (isset($_POST['editar_solicitud'])) {
                        $id_solicitud = $_POST['id_editar'];

                        $solicitud_recuperada = RepositorioSolicitud:: obtener_solicitudes_por_id(Conexion::obtener_conexion(), $id_solicitud);

                        include_once 'plantillas/form_solicitud_recuperada.inc.php';

                       
                    }
                    if (isset($_POST['guardar'])) {
                        $id_solicitud = $_POST['id_solicitud'];

                        if (isset($_POST['cerrar']) && $_POST['cerrar'] == "CERRADA") {

                            $cambio_efectuado = RepositorioSolicitud :: actualizar_solicitud(Conexion::obtener_conexion(), $id_solicitud, $_POST['cerrar'], $_POST['diagnostico'], $_POST['tecnico']);

                            if ($cambio_efectuado) {
                                Redireccion::redirigir(RUTA_GESTOR);
                            }
                        } else {


                            echo 'Solicitud no cerrada';
                        }
                         Conexion::cerrar_conexion();
                    }
                    ?>

                </form>
            </div>
        </div>
    </div>

</div>
<?php
include_once 'plantillas/documento_cierre.inc.php';
?>
    