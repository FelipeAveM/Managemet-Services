<div class="container">
    <div class="row">
        <div class=" col-sm-3 col-md-2 sidebar">
            <ul class=" nav nav-sidebar">
                <?php 
                if ($_SESSION['perfil']=='Técnico') {
                    ?>
                     <li>
                         <a href="<?php echo RUTA_GESTOR_SOLICITUDES; ?>"><h3>Solicitudes</h3></a>
                </li>
                
                <?php
                    
                }else{
                    ?>
                    <li>
                        <a href="<?php echo RUTA_GESTOR_SOLICITUDES; ?>"><h3>Solicitudes</h3></a>
                </li>
                <li>
                    <a href="<?php echo RUTA_GESTOR_ESTADISTICAS; ?>"><h3>Estadistica</h3></a>
                </li>
                <li>
                    <a href="<?php echo RUTA_GESTOR_CALIFICACIONES; ?>"><h3>calificacion</h3></a>
                </li>
                <?php
                }
                ?>
                
                
            </ul>
            
        </div>
        <div class="col-sm-9 col-md-10 mail">
    