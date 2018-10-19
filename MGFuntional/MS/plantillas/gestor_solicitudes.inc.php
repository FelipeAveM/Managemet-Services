<div class="row parte-gestor-entradas">
    <div class="col-md-12">
        <h2>Gestion de Solicitudes</h2>
        <br>


        <a href="<?php echo RUTA_REGISTRO_SOLICITUD; ?>" class="btn btn-lg btn-primary" role="button" id="boton-nueva-entrada" >Crear Solicitud</a> 

        <br>
        <br>

    </div>

    <div class="row">
        <div class="col-md-12">
            <?php
            if (count($array_solicitudes) > 0) {
                ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Fecha</th> 
                            <th>Requerimiento</th> 
                            <th>Estado</th> 
                            <th>Prioridad</th> 
                            <th>Area</th> 
                            <th>Tienda</th> 
                            <th></th> 
                            <th></th> 
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        for ($i = 0; $i < count($array_solicitudes); $i++) {
                            $solicitud_actual = $array_solicitudes[$i][0];
                            $comentarios_solicitud_actual = $array_solicitudes[$i][1];
                            ?>

                            <tr>
                            
                                <td> <?php echo $solicitud_actual->obtenerFechaRegistro(); ?></td>
                                <td><?php echo  $solicitud_actual->obtenerDetalle(); ?></td>
                                <td> <?php echo $solicitud_actual->obtenerEstado(); ?></td>
                                <td> <?php echo $solicitud_actual->obtenerPrioridad(); ?> </td>
                                <td> <?php echo $solicitud_actual->obtenerAreaLocativa(); ?></td>
                                <td> <?php echo $solicitud_actual->obtenerTienda(); ?> </td>
                                <td>
                                   
                                <?php
                                        if ($_SESSION['perfil']=='Técnico'|| $_SESSION['perfil']=='Supervisor') {
                                            ?>
                                     <form method="post" action="<?php echo RUTA_EDITAR_SOLICITUD; ?>">
                                        <input type="hidden" name="id_editar" value="<?php echo $solicitud_actual->obtenerId(); ?>">
                                               
                                        <button type="submit" class="btn btn-default btn-xs" name="editar_solicitud">Gestionar SM</button>
                                    </form>
                                    <?php
                                        } else {
                                            ?>
                                    
                                           <?php 
                                        }
                                    ?>
                                    </td>
                                <td> 
                                    <?php
                                        if ($_SESSION['perfil']=='Supervisor') {
                                            ?>
                                    <form method="post" action="<?php echo RUTA_BORRAR_SOLICITUD; ?>">
                                        <input type="hidden" name="id_borrar" value="<?php echo $solicitud_actual->obtenerId(); ?>">
                                               
                                        <button type="submit" class="btn btn-default btn-xs" name="borrar_solicitud">Borrar SM</button>
                                    </form>
                                    <?php
                                        } else {
                                            ?>
                                    
                                    
                                           <?php 
                                        }
                                    ?>
                                   

                                </td>
                            </tr>

                            <?php
                        }
                        ?>


                    </tbody>

                </table > 

                <?php
            } else {
                ?>
                <h3 class="text-center">No hay SM para calificar </h3>
                <br>
                <br>
                <?php
            }
            ?>

        </div>
    </div> 

</div>
