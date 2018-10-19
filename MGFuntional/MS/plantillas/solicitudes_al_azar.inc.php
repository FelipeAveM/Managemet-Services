<?php 


?>





<div class="row">
    <div class ='col-md-12'>
        <hr>
        <h3>Otras Solicitudes Abiertas</h3>

    </div>
    <?php
    for ($i = 0; $i < count($solicitudes_azar); $i++) {
        $solicitud_actual = $solicitudes_azar[$i];
        ?>
        <div class="col-md-3">
            <div class='panel panel-default'>
                <div class="panel-heading">
                    <?php echo $solicitud_actual->obtenerTienda(); ?>

                </div>
                <div class="panel-body">

                    <p>
                        <?php echo $solicitud_actual->obtenerDetalle(); ?>
                    </p>
                </div>

            </div>


        </div>
        <?php
    }
    ?>
    <div class="col-md-6">
        <hr>
    </div>
</div>
