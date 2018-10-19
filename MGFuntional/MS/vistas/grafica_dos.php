

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
<nav class="col-md-2 d-none d-md-block bg-light sidebar">

    <div class="sidebar-sticky">

        <ul class="nav flex-column">

            <li class="nav-item">

                <a class="nav-link active" href="<?php echo RUTA_GESTOR_ESTADISTICAS ?>">

                    <span data-feather="home"></span>

                    Inicio <span class="sr-only">(current)</span>

                </a>

            </li>

            </li>

        </ul>




    </div>

</nav>

<?php
$usuarios_tecnicos = RepositorioUsuario::obtener_todos_usuarios_tecnicos(Conexion::obtener_conexion());
if (count($usuarios_tecnicos) > 0) {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 text-left">
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Fecha</th> 
                            <th>Cargo</th> 
                            <th>Nombre</th> 
                            <th>Id</th> 
                            <th class="alert alert-success text-center"> Cantidad SM Cerradas </th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $solicitudes = array();
                        for ($i = 0; $i < count($usuarios_tecnicos); $i++) {

                            $usuario_actual = $usuarios_tecnicos[$i];
                            $cantidad_solicitudes = RepositorioUsuario::obtener_solicitudes_cerradas(Conexion::obtener_conexion(), $usuario_actual->obtenerNombre());

                            $solicitudes[$i] = $cantidad_solicitudes;
                            ?>

                            <tr>

                                <td> <?php echo$usuario_actual->obtenerFechaRegistro(); ?></td>
                                <td><?php echo $usuario_actual->obtenerPerfil(); ?></td>
                                <td> <?php echo$usuario_actual->obtenerNombre(); ?></td>
                                <td> <?php echo $usuario_actual->obtenerId(); ?> </td>
                                <td class="text-center"> <?php echo $cantidad_solicitudes ?> </td>

                            </tr>

                            <?php
                        }
                        ?>


                    </tbody>

                </table > 

                <?php
            } else {
                ?>
                <h3 class="text-center">No hay usuarios que mostrar</h3>
                <br>
                <br>
                <?php
            }
            ?>

            <html lang="en">



                <body>



                    <div class="container-fluid">

                        <div class="row">



                            <main role="main" class="col-md-12 ml-sm-auto col-lg-14 pt-4 px-5">

                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

                                    <h1 class="h2">Estadisticas</h1>
                                    <h1 class="h2">Solicitudes Cerradas Tecnicos</h1>
                                    <hr>
                                    <br>

                                </div>

                                <canvas class="my-4" id="myChart" width="900" height="380"></canvas>
                        </div>

                        </main>

                    </div>

        </div>

        <!-- Bootstrap core JavaScript
        
        ================================================== -->

        <!-- Placed at the end of the document so the pages load faster -->

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

        <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>

        <script src="../../../../assets/js/vendor/popper.min.js"></script>

        <script src="../../../../dist/js/bootstrap.min.js"></script>

        <!-- Icons -->

        <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>

        <script>

            feather.replace()

        </script>

        <!-- Graphs -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

        <script>



            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {

                type: 'line',
                data: {

                    labels: ["<?php echo $usuarios_tecnicos[0]->obtenerNombre(); ?>", "<?php echo $usuarios_tecnicos[1]->obtenerNombre(); ?>",
                        "<?php echo $usuarios_tecnicos[2]->obtenerNombre(); ?>", "<?php echo $usuarios_tecnicos[3]->obtenerNombre(); ?>", "<?php echo $usuarios_tecnicos[4]->obtenerNombre(); ?>", "<?php echo $usuarios_tecnicos[5]->obtenerNombre(); ?>", "<?php echo $usuarios_tecnicos[6]->obtenerNombre(); ?>"],
                    datasets: [{data: [<?php echo $solicitudes[0] ?>, <?php echo $solicitudes[1] ?>, <?php echo $solicitudes[2] ?>, <?php echo $solicitudes[3] ?>
                                , <?php echo $solicitudes[4] ?>, <?php echo $solicitudes[5] ?>, <?php echo $solicitudes[6] ?>],
                            lineTension: 0,
                            backgroundColor: 'transparent',
                            borderColor: '#007bff',
                            borderWidth: 4,
                            pointBackgroundColor: '#007bff'

                        }]



                },
                options: {

                    scales: {

                        yAxes: [{

                                ticks: {

                                    beginAtZero: false

                                }

                            }]

                    },
                    legend: {

                        display: false

                    }

                }

            });



        </script>

        </body>

        </html>

