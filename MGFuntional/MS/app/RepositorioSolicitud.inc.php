<?php

class RepositorioSolicitud {

    public static function obtener_todos($conexion) {

        $solicitudes = array();

        if (isset($conexion)) {
            try {
                include_once 'solicitud.inc.php';

                $sql = "SELECT * FROM solicitudes";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $solicitudes[] = new solicitud(
                                $fila['id_solicitud'], $fila['detalle'], $fila['prioridad'], $fila['estado'], $fila['fecha_registro'], $fila['fecha_cierre'], $fila ['nombre_usuario'], $fila ['area_locativa'], $fila ['tienda'], $fila ['detalle_cierre'], $fila ['calificacion'], $fila ['tecnico_responsable']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $solicitudes;
    }

    // este metodo inserta ala base de datos una solicitud 

    public static function insertar_solicitud($conexion, $solicitud) {

        $solicitud_insertada = false;

        if (isset($conexion)) {

            try {
                $sql = "INSERT INTO solicitudes (detalle,prioridad,estado,fecha_registro,fecha_cierre,nombre_usuario,area_locativa,tienda,detalle_cierre,calificacion,tecnico_responsable)VALUES(:detalle,:prioridad,'ABIERTA',NOW(),0,:nombre_usuario,:area_locativa,:tienda,0,0,0)";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':detalle', $solicitud->obtenerDetalle(), PDO::PARAM_STR);
                $sentencia->bindParam(':prioridad', $solicitud->obtenerPrioridad(), PDO::PARAM_STR);
                $sentencia->bindParam(':area_locativa', $solicitud->obtenerAreaLocativa(), PDO::PARAM_STR);
                $sentencia->bindParam(':nombre_usuario', $solicitud->obtenerNombreUsuario(), PDO::PARAM_STR);
                $sentencia->bindParam(':tienda', $solicitud->obtenerTienda(), PDO::PARAM_STR);

                $solicitud_insertada = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $solicitud_insertada;
    }

    public static function obtener_solicitudes_por_fecha_descendente($conexion) {

        $solicitudes = [];
        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM solicitudes ORDER BY fecha_registro DESC LIMIT 3 ";


                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {

                        $solicitudes [] = new solicitud(
                                $fila['id_solicitud'], $fila['detalle'], $fila['prioridad'], $fila['estado'], $fila['fecha_registro'], $fila['fecha_cierre'], $fila ['nombre_usuario'], $fila ['area_locativa'], $fila ['tienda'], $fila ['detalle_cierre'], $fila ['calificacion'], $fila ['tecnico_responsable']
                        );
                    }
                }
            } catch (Exception $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $solicitudes;
    }

    public static function obtener_solicitudes_por_tienda($conexion) {

        $solicitudes = [];
        if (isset($conexion)) {
            try {
                $nombre = $_SESSION['nombre_usuario'];
                $tienda = $_SESSION['nombre_tienda'];

                $sql = "SELECT* FROM solicitudes WHERE nombre_usuario = '$nombre' AND tienda ='$tienda' AND estado = 'ABIERTA'";


                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if ($num = count($resultado)) {
                    ?>


                    <?php
                    foreach ($resultado as $fila) {

                        $solicitudes [] = new solicitud(
                                $fila['id_solicitud'], $fila['detalle'], $fila['prioridad'], $fila['estado'], $fila['fecha_registro'], $fila['fecha_cierre'], $fila ['nombre_usuario'], $fila ['area_locativa'], $fila ['tienda'], $fila ['detalle_cierre'], $fila ['calificacion'], $fila ['tecnico_responsable']
                        );
                    }
                }

                if ($num == 0) {
                    ?>
                    <div class="alert alert-success">
                        <strong> <?php
                    $nom = $_SESSION['nombre_usuario'];
                    echo "$nom";
                    ?>!</strong> <?php
                    echo ' Tienes ' . "$num" . ' solicitudes abiertas';
                    ?>.
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-danger">
                        <strong><?php
                            $nom = $_SESSION['nombre_usuario'];
                            echo "$nom";
                            ?>!</strong> <?php
                    echo ' Tienes ' . "$num" . ' solicitudes abiertas';
                            ?>.
                    </div>
                    <?php
                }
            } catch (Exception $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $solicitudes;
    }

    // Se obtiene solicitudes pasando por parametro una id de la solicitud almacenada en la base de datos.

    public static function obtener_solicitudes_por_id($conexion, $id_solicitud) {

        $solicitud = null;
        if (isset($conexion)) {
            try {


                $sql = "SELECT * FROM solicitudes WHERE id_solicitud LIKE :id_solicitud";


                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id_solicitud', $id_solicitud, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {

                    $solicitud = new Solicitud(
                            $resultado['id_solicitud'], $resultado['detalle'], $resultado['prioridad'], $resultado['estado'], $resultado['fecha_registro'], $resultado['fecha_cierre'], $resultado ['nombre_usuario'], $resultado['area_locativa'], $resultado ['tienda'], $resultado ['detalle_cierre'], $resultado['calificacion'], $resultado ['tecnico_responsable']
                    );
                }
            } catch (Exception $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $solicitud;
    }

    //  Se obtienen solicitudes de la base de datos al azar 

    public static function obtener_solicitudes_al_azar($conexion, $limite) {
        $solicitudes = [];
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM solicitudes ORDER BY RAND() LIMIT $limite";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $solicitudes [] = new Solicitud(
                                $fila['id_solicitud'], $fila['detalle'], $fila['prioridad'], $fila['estado'], $fila['fecha_registro'], $fila['fecha_cierre'], $fila ['nombre_usuario'], $fila ['area_locativa'], $fila ['tienda'], $fila ['detalle_cierre'], $fila ['calificacion'], $fila ['tecnico_responsable']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $solicitudes;
    }

    // cuenta las solicitudes que estan en estadi ABIERTA en la base de datos 

    public static function contar_solicitudes_abiertas_usuario($conexion, $nombre_usuario) {
        $total_solicitudes = '0';

        if (isset($conexion)) {
            try {

                $sql = "SELECT COUNT(*) as total_solicitudes FROM solicitudes WHERE nombre_usuario = :nombre_usuario AND estado = 'ABIERTA'  ";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {

                    $total_solicitudes = $resultado['total_solicitudes'];
                }
            } catch (Exception $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $total_solicitudes;
    }
    
    // contar las solicitudes abiertas 
    
     public static function contar_solicitudes_abiertas($conexion) {
        $total_solicitudes = '0';

        if (isset($conexion)) {
            try {

                $sql = "SELECT COUNT(*) as total_solicitudes FROM solicitudes WHERE estado = 'ABIERTA'  ";

                $sentencia = $conexion->prepare($sql);

                

                $sentencia->execute();

                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {

                    $total_solicitudes = $resultado['total_solicitudes'];
                }
            } catch (Exception $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $total_solicitudes;
    }

// cuenta las solicitudes de la base de datos que se encuentrann en estado cerrado

    public static function contar_solicitudes_cerradas_usuario($conexion, $nombre_usuario) {
        $total_solicitudes = '0';

        if (isset($conexion)) {
            try {

                $sql = "SELECT COUNT(*) as total_solicitudes FROM solicitudes WHERE nombre_usuario = :nombre_usuario AND estado = 'CERRADA'  ";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {

                    $total_solicitudes = $resultado['total_solicitudes'];
                }
            } catch (Exception $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $total_solicitudes;
    }
    // contar todas las solicitudes cerradas 
    
     public static function contar_solicitudes_cerradas($conexion) {
        $total_solicitudes = '0';

        if (isset($conexion)) {
            try {

                $sql = "SELECT COUNT(*) as total_solicitudes FROM solicitudes WHERE estado = 'CERRADA'  ";

                $sentencia = $conexion->prepare($sql);

                $sentencia->execute();

                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {

                    $total_solicitudes = $resultado['total_solicitudes'];
                }
            } catch (Exception $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $total_solicitudes;
    }


    // contar solicitudes calificadas 
    
    
     public static function contar_solicitudes_calificadas_usuario($conexion, $nombre_usuario) {
        $total_solicitudes = '0';

        if (isset($conexion)) {
            try {

                $sql = "SELECT COUNT(*) as total_solicitudes FROM solicitudes WHERE nombre_usuario = :nombre_usuario AND calificacion !='0'";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {

                    $total_solicitudes = $resultado['total_solicitudes'];
                }
            } catch (Exception $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $total_solicitudes;
    }
    
    // contar todas las solicitudes calificadas 
    public static function contar_solicitudes_calificadas($conexion) {
        $total_solicitudes = '0';

        if (isset($conexion)) {
            try {

                $sql = "SELECT COUNT(*) as total_solicitudes FROM solicitudes WHERE calificacion !='0'";

                $sentencia = $conexion->prepare($sql);

                $sentencia->execute();

                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {

                    $total_solicitudes = $resultado['total_solicitudes'];
                }
            } catch (Exception $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $total_solicitudes;
    }
    // metodo cantidad de solicitudes sin calificar
    
    public static function contar_solicitudes_sin_calificar_usuario($conexion, $nombre_usuario) {
        $total_solicitudes = '0';

        if (isset($conexion)) {
            try {

                $sql = "SELECT COUNT(*) as total_solicitudes FROM solicitudes WHERE nombre_usuario = :nombre_usuario AND calificacion ='0'";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {

                    $total_solicitudes = $resultado['total_solicitudes'];
                }
            } catch (Exception $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $total_solicitudes;
    }
    // contar todas las solicitudes sin calificar
    public static function contar_solicitudes_sin_calificar($conexion) {
        $total_solicitudes = '0';

        if (isset($conexion)) {
            try {

                $sql = "SELECT COUNT(*) as total_solicitudes FROM solicitudes WHERE calificacion ='0'";

                $sentencia = $conexion->prepare($sql);

                $sentencia->execute();

                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {

                    $total_solicitudes = $resultado['total_solicitudes'];
                }
            } catch (Exception $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $total_solicitudes;
    }
    
    
    
    // Metodo utilizado en gestor de solicitudes, para obtener los datos de mySQL.

    public static function obtener_solicitudes_usuario_fecha_descendente($conexion, $nombre_usuario) {
        $solicitudes_obtenidas = [];

        if (isset($conexion)) {
            try {
                $sql = "SELECT a.id_solicitud, a.detalle, a.prioridad, a.estado, a.fecha_registro, a.fecha_cierre, a.nombre_usuario,a.area_locativa, a.tienda, a.detalle_cierre, a.calificacion, a.tecnico_responsable, COUNT(b.id_usuario) AS 'cantidad_comentarios' FROM solicitudes a 
LEFT JOIN usuarios b ON a.id_solicitud = b.id_usuario
WHERE a.nombre_usuario =:nombre_usuario AND a.estado = 'ABIERTA'
GROUP BY a.id_solicitud
ORDER BY a.fecha_registro DESC";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();


                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $solicitudes_obtenidas [] = array(
                            new Solicitud(
                                    $fila['id_solicitud'], $fila['detalle'], $fila['prioridad'], $fila['estado'], $fila['fecha_registro'], $fila['fecha_cierre'], $fila ['nombre_usuario'], $fila ['area_locativa'], $fila ['tienda'], $fila ['detalle_cierre'], $fila ['calificacion'], $fila ['tecnico_responsable']
                            ),
                            $fila['cantidad_comentarios']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $solicitudes_obtenidas;
    }
    
    
    // solicitudes abiertas 
    
    public static function obtener_solicitudes_usuario_fecha_descendente_abiertas($conexion) {
        $solicitudes_obtenidas = [];

        if (isset($conexion)) {
            try {
                $sql = "SELECT a.id_solicitud, a.detalle, a.prioridad, a.estado, a.fecha_registro, a.fecha_cierre, a.nombre_usuario,a.area_locativa, a.tienda, a.detalle_cierre, a.calificacion, a.tecnico_responsable, COUNT(b.id_usuario) AS 'cantidad_comentarios' FROM solicitudes a 
LEFT JOIN usuarios b ON a.id_solicitud = b.id_usuario
WHERE  a.estado = 'ABIERTA'
GROUP BY a.id_solicitud
ORDER BY a.fecha_registro DESC";

                $sentencia = $conexion->prepare($sql);

            

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();


                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $solicitudes_obtenidas [] = array(
                            new Solicitud(
                                    $fila['id_solicitud'], $fila['detalle'], $fila['prioridad'], $fila['estado'], $fila['fecha_registro'], $fila['fecha_cierre'], $fila ['nombre_usuario'], $fila ['area_locativa'], $fila ['tienda'], $fila ['detalle_cierre'], $fila ['calificacion'], $fila ['tecnico_responsable']
                            ),
                            $fila['cantidad_comentarios']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $solicitudes_obtenidas;
    }
    
    

    // este metodo sirve para borrar de la base de datos un usuario y una solicitud.
    
    
    

    public static function eliminar_solicitudes($conexion, $id_solicitud) {
        if (isset($conexion)) {
            try {
                $conexion->beginTransaction();

//$sql1 ="DELETE FROM usuarios WHERE id_usuario=:id_solicitud";
//$sentencia1 =$conexion -> prepare($sql1);
//$sentencia1 -> bindParam(':id_usuario',$id_solicitud,PDO::PARAM_STR); 
//$sentencia1 -> execute();

                $sql2 = "DELETE FROM solicitudes WHERE id_solicitud = :id_solicitud";
                $sentencia2 = $conexion->prepare($sql2);
                $sentencia2->bindParam(':id_solicitud', $id_solicitud, PDO::PARAM_STR);
                $sentencia2->execute();




                $conexion->commit();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
                $conexion->rollBack();
            }
        }
    }

    public static function actualizar_solicitud($conexion,$id_solicitud,$estado, $detalle_cierre, $tecnico_responsable) {
        
        $actualizacion_correcta = false;
        
        if (isset($conexion)) {
            
           
            try {
                
                $sql = "UPDATE solicitudes SET estado = :estado, detalle_cierre = :detalle_cierre,tecnico_responsable =:tecnico_responsable,fecha_cierre = NOW() "
                        . "WHERE id_solicitud = :id_solicitud";
                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':estado', $estado, PDO:: PARAM_STR);
                $sentencia->bindParam(':detalle_cierre', $detalle_cierre, PDO:: PARAM_STR);
                $sentencia->bindParam(':tecnico_responsable', $tecnico_responsable, PDO:: PARAM_STR);
                 $sentencia->bindParam(':id_solicitud', $id_solicitud, PDO:: PARAM_STR);
              
                $sentencia -> execute();
                $resultado = $sentencia -> rowCount();
                
                if (count($resultado)) {
                    $actualizacion_correcta =true;
                    
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
              
            }
        }
          
        return $actualizacion_correcta;
    }

public static function obtener_solicitudes_usuario_cerradas($conexion, $nombre_usuario) {
        $solicitudes_obtenidas = [];

        if (isset($conexion)) {
            try {
                $sql = "SELECT a.id_solicitud, a.detalle, a.prioridad, a.estado, a.fecha_registro, a.fecha_cierre, a.nombre_usuario,a.area_locativa, a.tienda, a.detalle_cierre, a.calificacion, a.tecnico_responsable, COUNT(b.id_usuario) AS 'cantidad_comentarios' FROM solicitudes a 
LEFT JOIN usuarios b ON a.id_solicitud = b.id_usuario
WHERE a.nombre_usuario =:nombre_usuario AND a.estado = 'CERRADA' AND a.calificacion = '0'
GROUP BY a.id_solicitud
ORDER BY a.fecha_registro DESC";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();


                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $solicitudes_obtenidas [] = array(
                            new Solicitud(
                                    $fila['id_solicitud'], $fila['detalle'], $fila['prioridad'], $fila['estado'], $fila['fecha_registro'], $fila['fecha_cierre'], $fila ['nombre_usuario'], $fila ['area_locativa'], $fila ['tienda'], $fila ['detalle_cierre'], $fila ['calificacion'], $fila ['tecnico_responsable']
                            ),
                            $fila['cantidad_comentarios']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $solicitudes_obtenidas;
    }
    
    
    
    public static function calificar_solicitud($conexion,$id_solicitud,$calificacion) {
        
        $actualizacion_correcta = false;
        
        if (isset($conexion)) {
            
           
            try {
                
                $sql = "UPDATE solicitudes SET calificacion = :calificacion  "
                        . "WHERE id_solicitud = :id_solicitud ";
                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':calificacion', $calificacion, PDO:: PARAM_STR);
               
                 $sentencia->bindParam(':id_solicitud', $id_solicitud, PDO:: PARAM_STR);
              
                $sentencia -> execute();
                $resultado = $sentencia -> rowCount();
                
                if (count($resultado)) {
                    $actualizacion_correcta =true;
                    
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
              
            }
        }
          
        return $actualizacion_correcta;
    }
}