<?php

class Solicitud {

    private $id_solicitud;
    private $detalle;
    private $prioridad;
    private $estado;
    private $fecha_registro;
    private $fecha_cierre;
    private $nombre_usuario;
    private $area_locativa;
    private $tienda;
    private $detalle_cierre;
    private $calificacion;
    private $tecnico_responsable;

    public function __construct($id_solicitud, $detalle, $prioridad, $estado, $fecha_registro, $fecha_cierre, $nombre_usuario, $area_locativa, $tienda, $detalle_cierre, $calificacion, $tecnico_responsable) {

        $this->id_solicitud = $id_solicitud;
        $this->detalle = $detalle;
        $this->prioridad = $prioridad;
        $this->estado = $estado;
        $this->fecha_registro = $fecha_registro;
        $this->fecha_cierre = $fecha_cierre;
        $this->nombre_usuario = $nombre_usuario;
        $this->area_locativa = $area_locativa;
        $this->tienda = $tienda;
        $this->detalle_cierre = $detalle_cierre;
        $this->calificacion = $calificacion;
        $this->tecnico_responsable = $tecnico_responsable;
    }

    public function obtenerId() {
        return $this->id_solicitud;
    }

    public function obtenerDetalle() {
        return $this->detalle;
    }

    public function obtenerPrioridad() {
        return $this->prioridad;
    }

    public function obtenerEstado() {
        return $this->estado;
    }

    public function obtenerFechaRegistro() {
        return $this->fecha_registro;
    }

    public function obtenerFechaCierre() {
        return $this->fecha_cierre;
    }

    public function obtenerNombreUsuario() {
        return $this->nombre_usuario;
    }

    public function obtenerAreaLocativa() {
        return $this->area_locativa;
    }

    public function obtenerDetalleCierre() {
        return $this->detalle_cierre;
    }

    public function obtenerCalificacion() {
        return $this->calificacion;
    }

    public function obtenerTecnicoResponsable() {
        return $this->tecnico_responsable;
    }

    public function obtenerTienda() {
        return $this->tienda;
    }

    // Metodos para cambiar los atributos 
    
    public function cambiarId($id) {
        $this->id = $id;
    }

    public function cambiarDetalle($detalle) {

        $this->detalle = $detalle;
    }

    public function cambiarPrioridad($prioridad) {
        $this->prioridad = $prioridad;
    }

    public function cambiarEstado($estado) {
        $this->estado = $estado;
    }

    public function cambiarFechaCierre($fecha_cierre) {
        $this->id_equipo = $fecha_cierre;
    }

    public function cambiarAreaLocativa($area_locativa) {
        $this->area_locativa = $area_locativa;
    }

    public function cambiarTienda($tienda) {
        $this->area_locativa = $tienda;
    }

    public function cambiarDetalleCierre($detalle_cierre) {
        $this->detalle_cierre = $detalle_cierre;
    }
    public function cambiarCalificacion($calificacion) {
        $this->calificacion = $calificacion;
    }
    public function cambiarTecnicoCierre($tecnico_cierre) {
        $this->tecnico_cierre = $tecnico_cierre;
    }
}
