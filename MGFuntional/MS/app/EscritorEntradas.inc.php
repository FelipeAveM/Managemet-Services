<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioSolicitud.inc.php';
include_once 'app/solicitud.inc.php';

class EscritorSolicitudes {

    public static function escribir_solicitudes() {
        $solicitudes = RepositorioSolicitud::obtener_solicitudes_por_fecha_descendente(Conexion::obtener_conexion());

        if (count($solicitudes)) {
            foreach ($solicitudes as $solicitud) {
                self:: escribir_solicitud($solicitud);
            }
        }
    }

    public static function escribir_solicitud($solicitud) {
        if (!isset($solicitud)) {
            return;
        }
        ?>

        <div class="row ">

            <div class=" col-md-12">

                <div class="panel panel-default">

                    <div class="panel-body">
                        <h5><?php
                            echo'Tienda: ' . $solicitud->obtenerTienda();
                            ?></h5>

                        <h5><?php
                            echo 'Solicitante: ' . $solicitud->obtenerNombreUsuario();
                            ?></h5>


                        <?php
                        echo 'Id SM : ' . $solicitud->obtenerId();
                        ?>
                        <br>
                        <?php
                        echo 'Fecha de Creacion : ' . $solicitud->obtenerFechaRegistro();
                        ?>

                        <br>
                        <br>

                        <div class="alert alert-info">
                            <?php
                            echo $solicitud->obtenerDetalle();
                            ?>
                        </div>  
                       
                    </div>

                </div>

            </div>


        </div>


        <?php
    }

}
?>
