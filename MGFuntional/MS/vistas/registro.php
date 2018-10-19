<?php
include_once 'app/Conexion.inc.php';
include_once 'app/config.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioSolicitud.inc.php';


include_once 'app/ValidadorRegistro.inc.php';
include_once 'app/Redireccion.inc.php';

if (isset($_POST['enviar'])) {
    Conexion :: abrir_conexion();

    $validador = new ValidadorRegistro($_POST['nombre'], $_POST['correo'], $_POST['clave1'], $_POST['clave2'], Conexion::obtener_conexion());

    if ($validador->registro_valido()) {


        $usuario = new Usuario('', $validador->obtener_nombre(), $validador->obtener_correo(), password_hash($validador->obtener_clave(), PASSWORD_DEFAULT), '', '', $_POST['perfil'], $_POST['tienda']);

        $usuario_insertado = RepositorioUsuario :: insertar_usuario(Conexion :: obtener_conexion(), $usuario);

        if ($usuario_insertado) {

            Redireccion::redirigir(RUTA_REGISTRO_CORRECTO . '/' . $validador->obtener_nombre());
        }
    }
    Conexion :: cerrar_conexion();
}

$titulo = "Registro";
include_once 'plantillas/documento_declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>
<div class="container">
    <div class="jumbotron text-center">
        <h1 class="text-center">Ingreso De Usuarios Management Services </h1>
        <h4> Empresa </h4>

    </div>
    <div class="container">
        <div class="row">

            <div class="col-md-6 text-center">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Instrucciones 
                        </h3>
                    </div>
                    <div class="panel-body">
                        <br>
                        <p class="text-justify">
                            <br>
                            Para unirte a la plataforma de Management Services 
                            requerimos que introduzcas un nombre de usuario, tu email corporativo y una contraseña.
                        </p>
                        <br>
                        <a href="#">¿Ya te encuentras registrado?</a>
                        <br>
                        <a href="#">¿olvidaste tu contraseña?</a>

                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Introduce tus datos 
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action= "<?php echo RUTA_REGISTRO ?>">

<?php
if (isset($_POST['enviar'])) {
    include_once 'plantillas/registro_validado.inc.php';
} else {
    include_once 'plantillas/registro_vacio.inc.php';
}
?>

                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>
<?php
include_once 'plantillas/documento_cierre.inc.php';
?>