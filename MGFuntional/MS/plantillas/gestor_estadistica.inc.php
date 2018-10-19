

<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioSolicitud.inc.php';
include_once 'app/Usuario.inc.php';

include_once 'app/ValidadorLogin.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';
$titulo = '¡ graficas!';
include_once 'plantillas/documento_declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';

?>

<!doctype html>
<div class="list-group">
  <a  class="list-group-item list-group-item-action active">
    Estadisticas
  </a>
     
  <a href="<?php echo RUTA_GRAFICA ?>" class="list-group-item list-group-item-action">Tecnicos SM Abiertas</a>
  
  <a href="<?php echo RUTA_GRAFICA_DOS ?>" class="list-group-item list-group-item-action">Tecnicos SM Cerrada</a>
  <a href="<?php echo RUTA_GRAFICA_TRES ?>" class="list-group-item list-group-item-action">Tiendas SM Abiertas</a>
  <a href="<?php echo RUTA_GRAFICA_CUATRO ?>" class="list-group-item list-group-item-action">Tiendas SM Cerradas</a>
</div>

