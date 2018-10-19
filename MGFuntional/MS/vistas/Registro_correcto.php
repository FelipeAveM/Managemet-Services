<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioSolicitud.inc.php';

include_once 'app/Redireccion.inc.php';

$titulo ='¡ Registro correcto!';
include_once 'plantillas/documento_declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    
                     <span class="glyphicon glyphicon-ok-circle" aria-hidden="true" ></span> Registro correcto
                     
                </div>
                <div class="panel-body text-center">
                    <p>¡Gracias por registrarte <b><?php  echo $nombre?></b>!</p>
                    <br>
                    <p><a href="<?php echo SERVIDOR ?>">Inicia Sesion </a>  para comenzar a usar tu cuenta.</p>
                         
                     </div>
            </div>
            
        </div>
        
    </div>
    
    
</div>
