


<?php
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioSolicitud.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/config.inc.php';
include_once 'app/EscritorEntradas.inc.php';
include_once 'app/Escritorsolicitud.inc.php';
$titulo = "UsuarioIniciado";
include_once 'plantillas/documento_declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>



<div class="container">
    <div class="jumbotron">
        <h2>SM Solicitudes Mantenimiento</h2>
        <h4> K-tronix / Alkosto</h4>
    </div>
</div>
<div class="container">

    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Busqueda
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <input type="Search" class="form-control" placeholder="¿que buscas?">

                            </div>
                            <button class="form-control">Buscar</button>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Solicitudes
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <input type="Search" class="form-control" placeholder="¿Numero de Solicitud ?">

                            </div>
                            <button class="form-control">Buscar</button>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Equipos
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <input type="Search" class="form-control" placeholder="¿Buscar equipo ?">

                            </div>
                            <button class="form-control">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <?php
            EscritorSolicitudes::escribir_solicitudes();
            ?>
        </div>
    </div>
</div>
</div>
</div>

<?php
include_once 'plantillas/documento_cierre.inc.php';
?>
