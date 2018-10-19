<div class="row parte-gestor-entradas">
    <div class="col-md-12">
        <h2>Calificar  SM </h2>
        <br>

        <br>
        <br>

    </div>

    <div class="row">
        <div class="col-md-12">
            <?php
            if (count($array_solicitudes_cerradas) > 0) {
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
                            <th>Calificar</th> 
                           
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        for ($i = 0; $i < count($array_solicitudes_cerradas); $i++) {
                            $solicitud_actual = $array_solicitudes_cerradas[$i][0];
                            $comentarios_solicitud_actual = $array_solicitudes_cerradas[$i][1];
                            ?>

                            <tr>
                            
                                <td> <?php echo $solicitud_actual->obtenerFechaRegistro(); ?></td>
                                <td><?php echo  $solicitud_actual->obtenerDetalle(); ?></td>
                                <td> <?php echo $solicitud_actual->obtenerEstado(); ?></td>
                                <td> <?php echo $solicitud_actual->obtenerPrioridad(); ?> </td>
                                <td> <?php echo $solicitud_actual->obtenerAreaLocativa(); ?></td>
                                <td> <?php echo $solicitud_actual->obtenerTienda(); ?> </td>
                                <td>
                                    <form method="post" action="<?php echo RUTA_CALIFICAR_SOLICITUD; ?>">
                                        <input type="hidden" name="id_calificar" value="<?php echo $solicitud_actual->obtenerId(); ?>">
                                               
                                       <select class="btn-primary" name="calificacion" required="">
                                        <option value="1">1 </option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4 </option>
                                        <option value="5">5</option>
                                      
                                    </select>
                                        <br>
                                         <br>
                                        <button type="submit" class="btn btn-default btn-xs" name="calificar_solicitud">Calificar SM</button>
                                         
                                    </form>
                                    
                                    

                             
                                </td>
                               
                            <?php
                        }
                        ?>


                    </tbody>

                </table > 

                <?php
            } else {
                ?>
                <h3 class="text-center">No hay solicitudes que calificar</h3>
                <br>
                <br>
                <?php
            }
            ?>

        </div>
    </div> 

</div>

