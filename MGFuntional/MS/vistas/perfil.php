<?php


include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ControlSesion.inc.php';


if (!ControlSesion:: sesion_iniciada()) {
    Redireccion::redirigir(SERVIDOR);
} else {
    Conexion::abrir_conexion();
    $id = $_SESSION['id'];
    $usuario = RepositorioUsuario :: obtener_usuario_por_id(Conexion::obtener_conexion(), $id);
}
if (isset($_POST['guardar_imagen']) && !empty($_FILES['archivo_subido']['tmp_name'])) {
    $directorio = DIRECTORIO_RAIZ . "/subidas/";
    $carpeta_objetivo = $directorio . basename($_FILES['archivo_subido']['name']);
    $subida_correcta = 1;
    $tipo_imagen = pathinfo($carpeta_objetivo, PATHINFO_EXTENSION);

    $comprobacion = getimagesize($_FILES['archivo_subido']['tmp_name']);
    if ($comprobacion !== false) {
        $subida_correcta = 1;
    } else {
        $subida_correcta = 0;
    }

    if ($_FILES['archivo_subido']['size'] > 50000000) {
        echo 'el archivo no puede ocupar mas de 50000kb';
    }

    if ($tipo_imagen != "jpg" && $tipo_imagen != "png" && $tipo_imagen != "jpeg" && $tipo_imagen != "gif") {

        echo "Solo se admiten los formatos JPG, JPEG, PNG Y GIF";
        $subida_correcta = 0;
    }
    if ($subida_correcta == 0) {
        echo "Tu archivo no puede subirse";
    } else {
        if (move_uploaded_file($_FILES['archivo_subido']['tmp_name'], DIRECTORIO_RAIZ . "/subidas/" . $usuario->obtenerId())) {
            echo 'El archivo' . basename($_FILES['archivo_subido']['name']) . " ha sido subido.";
        } else {
            echo "Ha ocurrido un error.";
        }
    }
}

$titulo = "perfil de usuario";

include_once 'plantillas/documento_declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>


<div class="container perfil">

    <div class="row">

        <div class=" col-md-3">

<?php
if (file_exists(DIRECTORIO_RAIZ . "/subidas/" . $usuario->obtenerId())) {
    ?>
                <img src="<?php echo SERVIDOR.'/subidas/'.$usuario->obtenerId();?>" class="img-responsive">

    <?php
} else {
    ?>
                <img src="img/usuario1.png" class="img-responsive">
                <?php
            }
            ?>

            <br>
            <form class="text-center" action="<?php echo RUTA_PERFIL ?>" method="post"
                  enctype="multipart/form-data">
                <label for="archivo_subido" id="label-archivo">Sube una imagen</label>
                <input type="file" name="archivo_subido" id="archivo_subido" class="boton_subir">
                <br>
                <br>
                <input type="submit"value="Guardar" name="guardar_imagen" class="form-control">
            </form>


        </div>

        <div class="col-md-9">
            <h4><small>Nombre de Usuario</small></h4>
            <h4><?php echo $usuario->obtenerNombre(); ?></h4>
            <br>
            <h4><small>Email</small></h4>
            <h4><?php echo $usuario->obtenerCorreo(); ?></h4>
            <br>
            <h4><small>Cargo</small></h4>
            <h4><?php echo $usuario->obtenerPerfil(); ?></h4>
            <br>
            <h4><small>Usuario desde </small></h4>
            <h4><?php echo $usuario->obtenerFechaRegistro(); ?></h4>


        </div>
    </div>
</div>

<?php
include_once 'plantillas/documento_cierre.inc.php';

