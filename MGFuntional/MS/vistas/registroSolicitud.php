
<Script Language="JavaScript">
    function DameLaFechaHora() {
        var hora = new Date()
        var hrs = hora.getHours();
        var min = hora.getMinutes();
        var hoy = new Date();
        var m = new Array();
        var d = new Array()
        var an = hoy.getYear();
        m[0] = "Ene";
        m[1] = "Feb";
        m[2] = "Mar";
        m[3] = "Abr";
        m[4] = "May";
        m[5] = "Jun";
        m[6] = "Jul";
        m[7] = "Ago";
        m[8] = "Sep";
        m[9] = "Oct";
        m[10] = "Nov";
        m[11] = "Dic";
        document.write("Hora " + hrs + ":" + min + " (" +
                hoy.getDate() + " de " + m[hoy.getMonth()] + ")");
    }
</Script>


<?php
include_once 'app/Conexion.inc.php';
include_once 'app/config.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/solicitud.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioSolicitud.inc.php';
include_once 'app/Escritorsolicitud.inc.php';


if (isset($_POST['dato'])) {
    Conexion :: abrir_conexion();

    $solicitud = new Solicitud('', $_POST['detalle'], $_POST['prioridad'], '', '', '', $_POST['solicitante'], $_POST['area'], $_POST['tienda'],
            '','','');

    $solicitud_insertada = RepositorioSolicitud :: insertar_solicitud(Conexion :: obtener_conexion(), $solicitud);

    if ($solicitud_insertada) {
        // realizar pagina donde estentodas las solicitudes 
        Redireccion::redirigir(RUTA_GESTOR_SOLICITUDES);
    }
    Conexion :: cerrar_conexion();
}

$titulo = "Registro de solicitudes ";
include_once 'plantillas/documento_declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>

<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Ingreso De Solicitud SM</h1>
        <h4 class="text-center"> K-tronix / Alkosto</h4>
        <h3 class="text-center"><?php echo '' . $_SESSION['perfil']; ?> </h3>

    </div>
    <div class="container">
        <div class="row">


            <div class="col-md-6 text-left">
                

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">
                            Ingresa tu solicitud  <br> <?php echo '' . $_SESSION['nombre_usuario']; ?>.
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action= "<?php echo RUTA_REGISTRO_SOLICITUD ?>">

                            <div class="form-group">

                                <div class="form-group">
                                    <label>Fecha del Registro :</label>
                                    <text class="form-control"rows="1"  name="fecha"><script >
                                        DameLaFechaHora();
                                    </script></text>
                                </div>

                                <div class="form-group">
                                    <label>Solicitante:</label>
                                    <textarea class="form-control"rows="1"  name="solicitante" required readonly="" ><?php echo '' . $_SESSION['nombre_usuario']; ?></textarea>

                                </div>

                                <div class="form-group">
                                    <label>E-mail :</label>
                                    <textarea class="form-control"rows="1"  name="correo" required readonly="" disabled=""><?php echo '' . $_SESSION['correo']; ?></textarea>

                                </div>
                                <h4 class="panel-title text-left">Tienda:
                                    <select class="btn btn-primary " name="tienda">
                                        <option value="<?php echo '' . $_SESSION['nombre_tienda']; ?>"><?php echo '' . $_SESSION['nombre_tienda']; ?></option>

                                    </select>

                                </h4>
                                <br>

                                <h4 class="panel-title text-left">Prioridad:
                                    <select class="btn btn-primary " name="prioridad" required="">
                                        <option value="Media">Media</option>
                                        <option value="Baja">Baja</option>
                                        <option value="Alta">Alta</option>
                                    </select>

                                </h4>
                                <br>
                                <h4 class="panel-title text-left">Area Locativa:
                                    <select class="btn btn-primary " name="area" required="">
                                        <option value="Punto de venta">Punto de Venta </option>
                                        <option value="Baños"> Baños</option>
                                        <option value="cafeteria"> Cafeteria</option>
                                        <option value="Parqueadeero">Parqueadero </option>
                                        <option value="Puntos de pago"> puntos de pago</option>
                                        <option value="Zonas comunes"> Zonas comunes</option>
                                    </select>

                                </h4>

                                <br>
                                <div class="form-group" id="myDIV">
                                    <label>Diagnostico del Usuario :</label>
                                    <textarea class="form-control"rows="4" cols="66" name="detalle"placeholder=" 💻 ingresa tu solicitud de mantenimiento..." required=""></textarea>



                                    <br>
                                    <button type="reset" class="btn btn-default btn-primary">Limpiar</button> 

                                    <button type="submit" class="btn btn-default btn-primary" name="dato">Enviar SM</button>


                                    </form>
                                </div>
                            </div>

                    </div>

                </div>

            </div>
            <div class="col-md-6 text-success" >
                    <?php
                    EscritorEntrada::escribir_solicitudes();
                    ?>
                </div>
            <div>
                
            </div>
            <?php
            include_once 'plantillas/documento_cierre.inc.php';
            ?>
