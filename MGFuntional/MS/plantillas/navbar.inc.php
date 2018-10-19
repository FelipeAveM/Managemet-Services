<?php
include_once 'app/ControlSesion.inc.php';
include_once 'app/config.inc.php';
Conexion:: abrir_conexion();
$total_usuarios = RepositorioUsuario::obtener_todos(Conexion::obtener_conexion());
$total_solicitudes = RepositorioSolicitud::obtener_todos(Conexion::obtener_conexion());
?>

<nav class="navbar navbar-default navbar-static-top" >

    <div class="container">
        <div class="navbar-header">
            <button type="button"class= "navbar-toggle collapsed" data-toggle= "collapse" data-target= "#navbar" aria-expanded= "false" aria-controls= "navbar">
                <span class="sr-only">Este botn despliega  la barra de navegacion </span> 
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Management Services</a>

        </div>
        <div   id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right">
                <?php if (ControlSesion::sesion_iniciada()) { ?>

                    <ul class="nav navbar-nav">


                        <li><a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> 


                                <?php echo '' . $_SESSION['nombre_tienda']; ?>
                            </a></li>

                        <li><a href="#"><span class="glyphicon glyphicon-hdd" aria-hidden="true"></span> Gestor  

                            </a></li>


                    </ul>

                    <li>
                        <a href="#">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <?php echo '' . $_SESSION['nombre_usuario']; ?>
                        </a>
                    </li>



                    <li>
                        <a href="<?php echo RUTA_LOGOUT; ?>">

                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Cerrar sesion
                        </a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li>
                        <a href="#">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <?php
                            //echo count($total_usuarios);
                            ?>

                        </a>
                    </li>

                    <li>
                        <a href='<?php echo RUTA_LOGIN ?>'> 
                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Iniciar sesion
                        </a>
                    </li>

                    <li><a href= '<?php echo RUTA_REGISTRO ?>'>
                            <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Reguistro
                        </a>
                    </li>   

                    <?php
                }
                ?>


            </ul>
        </div>
    </div>
</nav>