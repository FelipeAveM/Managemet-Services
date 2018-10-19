<?php

class RepositorioUsuario {

    public static function obtener_todos($conexion) {

        $usuarios = array();

        if (isset($conexion)) {
            try {
                include_once 'Usuario.inc.php';

                $sql = "SELECT * FROM usuarios ";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $usuarios[] = new Usuario(
                                $fila['id_usuario'], $fila['nombre'], $fila['correo'], $fila['password'], $fila['fecha_registro'], $fila['activo'], $fila['perfil'], $fila['tienda']
                        );
                    }
                } 
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }


        return $usuarios;
    }

    // este metodo inserta ala base de datos un ususario

    public static function insertar_usuario($conexion, $usuario) {

        $usuario_insertado = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO usuarios(nombre,correo,password,fecha_registro,activo,perfil,tienda) VALUES(:nombre, :correo, :password,NOW(),0,:perfil,:tienda)";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':nombre', $usuario->obtenerNombre(), PDO::PARAM_STR);
                $sentencia->bindParam(':correo', $usuario->obtenerCorreo(), PDO::PARAM_STR);
                $sentencia->bindParam(':password', $usuario->obtenerPassword(), PDO::PARAM_STR);
                $sentencia->bindParam(':perfil', $usuario->obtenerPerfil(), PDO::PARAM_STR);
                $sentencia->bindParam(':tienda', $usuario->obtenerTienda(), PDO::PARAM_STR);
                $usuario_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $usuario_insertado;
    }

    // verifica que no exixta ya un nombre registrado en la base de datos.

    public static function nombre_existe($conexion, $nombre) {
        $nombre_existe = true;
        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM usuarios WHERE nombre = :nombre";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':nombre', $nombre, PDO:: PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if (count($resultado)) {
                    $nombre_existe = true;
                } else {
                    $nombre_existe = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $nombre_existe;
    }

    // se verifica que ya no exista una cuenta creada con este mismo correo.

    public static function correo_existe($conexion, $correo) {
        $correo_existe = true;
        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM usuarios WHERE correo = :correo";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':correo', $correo, PDO:: PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if (count($resultado)) {
                    $correo_existe = true;
                } else {
                    $correo_existe = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $correo_existe;
    }

    public static function obtener_usuario_correo($conexion, $correo) {

        $usuario = null;

        if (isset($conexion)) {

            try {
                include_once 'app/RepositorioUsuario.inc.php';
                include_once 'app/Usuario.inc.php';
                $sql = "SELECT * FROM usuarios WHERE correo = :correo";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':correo', $correo, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $usuario = new Usuario(
                            $resultado['id_usuario'], $resultado['nombre'], $resultado['correo'], $resultado['password'], $resultado['fecha_registro'], $resultado['activo'], $resultado['perfil'], $resultado['tienda']
                    );
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $usuario;
    }
    
    // usuario por id
    
    public static function obtener_usuario_por_id($conexion, $id) {

        $usuario = null;

        if (isset($conexion)) {

            try {
                include_once 'app/RepositorioUsuario.inc.php';
                include_once 'app/Usuario.inc.php';
                
                $sql = "SELECT * FROM usuarios WHERE id_usuario = :id ";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $usuario = new Usuario(
                            $resultado['id_usuario'], $resultado['nombre'], $resultado['correo'], $resultado['password'], $resultado['fecha_registro'], $resultado['activo'], $resultado['perfil'], $resultado['tienda']
                    );
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $usuario;
    }
    
    
    

    public static function obtener_todos_usuarios_tecnicos($conexion) {

        $usuarios = array();

        if (isset($conexion)) {
            try {
                include_once 'Usuario.inc.php';

                $sql = "SELECT * FROM usuarios WHERE perfil = 'Técnico'";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {

                        $usuarios[] = new Usuario(
                                $fila['id_usuario'], $fila['nombre'], $fila['correo'], $fila['password'], $fila['fecha_registro'], $fila['activo'], $fila['perfil'], $fila['tienda']
                        );
                    }
                } else {
                    print 'No hay usuarios';
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }


        return $usuarios;
    }

    public static function obtener_solicitudes_abiertas($conexion, $nombre_usuario) {

        $usuarios=null;

        if (isset($conexion)) {
            try {
                include_once 'Usuario.inc.php';

                $sql = "SELECT  COUNT(b.estado) AS 'cantidad_solicitudes' FROM usuarios a 
LEFT JOIN solicitudes b ON a.nombre = b.nombre_usuario
WHERE a.nombre = :nombre_usuario AND b.estado = 'ABIERTA'

";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();
                
               if (count($resultado)) {
                    foreach ($resultado as $fila) {

                        $usuarios = $fila['cantidad_solicitudes'];
                       
                    }
                }
                        
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $usuarios;
    }
    
    public static function obtener_solicitudes_cerradas($conexion, $nombre_usuario) {

        $usuarios=null;

        if (isset($conexion)) {
            try {
                include_once 'Usuario.inc.php';

                $sql = "SELECT  COUNT(b.estado) AS 'cantidad_solicitudes' FROM usuarios a 
LEFT JOIN solicitudes b ON a.nombre = b.nombre_usuario
WHERE a.nombre = :nombre_usuario AND b.estado = 'CERRADA'

";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();
                
               if (count($resultado)) {
                    foreach ($resultado as $fila) {

                        $usuarios = $fila['cantidad_solicitudes'];
                       
                    }
                }
                        
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $usuarios;
    }
    
    
    public static function obtener_tiendas($conexion) {

        $usuarios = array();

        if (isset($conexion)) {
            try {
                include_once 'Usuario.inc.php';

                $sql = "SELECT * FROM usuarios WHERE perfil = 'Técnico'";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {

                        $usuarios[] = new Usuario(
                                $fila['id_usuario'], $fila['nombre'], $fila['correo'], $fila['password'], $fila['fecha_registro'], $fila['activo'], $fila['perfil'], $fila['tienda']
                        );
                    }
                } else {
                    print 'No hay usuarios';
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }


        return $usuarios;
    }



}
