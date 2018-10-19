<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioSolicitud.inc.php';

include_once 'app/ValidadorLogin.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';

if (ControlSesion::sesion_iniciada()) {
    Redireccion::redirigir(SERVIDOR);
}

if (isset($_POST['login'])) {

    Conexion::abrir_conexion();

    $validador = new ValidadorLogin($_POST['email'], $_POST['clave'], Conexion::obtener_conexion());


    if ($validador->obtener_error() === '' &&
            !is_null($validador->obtener_usuario())) {
        if ($validador->obtener_usuario()->obtenerActivo() == '0') {
            ?>
<div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <h2><strong><span class="glyphicon glyphicon-warning-sign"></span></strong> <strong><?php echo $validador->obtener_usuario()->obtenerNombre()?>!</strong> No estas <strong>ACTIVO</strong> en  <strong>SM!</strong> solicitudes de mantenimiento.</h2>
  </div>

            <?php
        } else {

            ControlSesion::iniciar_sesion(
                    $validador->obtener_usuario()->obtenerPassword(), $validador->obtener_usuario()->obtenerNombre(), $validador->obtener_usuario()->obtenerTienda(), $validador->obtener_usuario()->obtenerCorreo(), $validador->obtener_usuario()->obtenerPerfil(), $validador->obtener_usuario()->obtenerId(), $validador->obtener_usuario()->obtenerActivo()
            );


            Redireccion:: redirigir(RUTA_INICIO);
        }
    }
    Conexion::cerrar_conexion();
}

$titulo = "login";
include_once 'plantillas/documento_declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-5">  
            <div class="panel panel-default">

                <div class="panel-body">
                    <form role="form"method="post"action="<?php echo RUTA_LOGIN; ?>">
                        <figure >
                            <img src="img/login.png" class="center-block">
                        </figure>
                        <br>
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" 
<?php
if (isset($_POST['login']) && isset($_POST ['correo']) && !empty($_POST['correo'])) {
    echo 'value=' . $_POST['correo'] . '"';
}
?>
                               required autofocus >
                        <label for="clave" class="sr-only">Contraseña</label>
                        <br>
                        <input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña" required >
                        <br>
                        <?php
                        if (isset($_POST['login'])) {
                            $validador->mostrar_error();
                        }
                        ?>
                        <button type="submit" name="login" class="btn btn-lg btn-primary btn-block">

                            Iniciar Sesion
                        </button>
                        <br>

                        <div class="text-center">
                            <a helf="#">¿Olvidaste tu contraseña?</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


