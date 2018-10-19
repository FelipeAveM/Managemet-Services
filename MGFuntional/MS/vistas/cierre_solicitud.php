
<?php
include_once 'app/Conexion.inc.php';
include_once 'app/config.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/solicitud.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioSolicitud.inc.php';
include_once 'app/Escritorsolicitud.inc.php';
include_once 'app/EscritorEntradas.inc.php';






$titulo = "Cierre de solicitudes ";
include_once 'plantillas/documento_declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>


<div class="container">
    <div class="row">


        <div class="col-md-12 text-left">


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">
                        Cierra tu solicitud  <br> <?php echo '' . $_SESSION['nombre_usuario']; ?>.
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action= "<?php echo $_SERVER['PHP_SELF'] ?>">

                        <div class="form-group">


                            <div class="alert alert-info">
                                <h5>Solicitud: <?php
                                    echo $solicitud->obtenerId();
                                    ?></h5>
                                <h5>Detalle solicitud : </h5>
                                <?php
                                echo $solicitud->obtenerDetalle();
                                ?>
                                <br>

                                <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 

                                        <?php
                                        echo $solicitud->obtenerNombreUsuario();
                                        ?>

                                    </a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> 

                                        <?php
                                        echo $solicitud->obtenerTienda();
                                        ?>

                                    </a></li>



                            </div> 






                            <div class="form-group">
                                <label>Fecha del Registro :</label>
                                <textarea class="form-control"rows="1"  name="fecha" disabled="" ><?php
                                    echo $solicitud->obtenerfechaRegistro();
                                    ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Responsable :</label>
                                <textarea class="form-control"rows="1"  name="solicitante" required disabled="" ><?php echo '' . $_SESSION['nombre_usuario']; ?></textarea>

                            </div>

                            <div class="form-group">
                                <label>E-mail :</label>
                                <textarea class="form-control"rows="1"  name="correo" required  disabled=""><?php echo '' . $_SESSION['correo']; ?></textarea>

                            </div>

                            <br>
                            <div class="form-group">
                                <label>Diagnostico Del Tecnico / Responsable</label>
                                <textarea class="form-control"rows="4" cols="66" name="detalle"placeholder=" 💻 ingresa un detalle del cierre de lasolicitud ..." required=""></textarea>



                                <br>
                                <button type="reset" class="btn btn-default btn-primary">Limpiar</button> 

                                <button type="submit" class="btn btn-default btn-primary" name="dato">Cerrar SM</button>


                                </form>
                            </div>
                        </div>

                </div>

            </div>

        </div>



        <div>
            <?php
            include_once 'plantillas/solicitudes_al_azar.inc.php';
            ?>
        </div>
        <?php
        include_once 'plantillas/documento_cierre.inc.php';
        ?>
