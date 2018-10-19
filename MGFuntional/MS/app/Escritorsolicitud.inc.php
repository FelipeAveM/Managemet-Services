
<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioSolicitud.inc.php';
include_once 'app/solicitud.inc.php';

class EscritorEntrada{

    public static function escribir_solicitudes() {
        $solicitudes = RepositorioSolicitud::obtener_solicitudes_por_tienda(Conexion::obtener_conexion());

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
        <div class="row">

            <div class=" col-md-12">

                <div class="panel panel-default">

                    <div class="panel-heading">
                      
                            <?php
                            echo $solicitud->obtenerTienda();
                            ?>
                            <br>
                            
                            <?php
                            echo 'Id Solicitud SM : ' . $solicitud->obtenerId();
                            ?>
                      
                    </div>

                    <div class="panel-body">
                        <p>
                          
                                <span class="glyphicon glyphicon-user"></span> <?php
                                echo $solicitud->obtenerNombreUsuario();
                                ?> 
                            </a>
                        </p> 
                        
                        <?php
                        echo $solicitud->obtenerDetalle();
                        ?>

                    </div>

                </div>

            </div>


        </div>


        <?php
    }

}
