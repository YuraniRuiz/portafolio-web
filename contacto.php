<?php

class Contacto {

    public $nombre;
    public $correo;
    public $telefono;
    public $direccion;
    public $servicio;
    public $contacto;
    public $cliente;
    public $mensaje;

    // Constructor
    public function __construct(
        $nombre,
        $correo,
        $telefono,
        $direccion,
        $servicio,
        $contacto,
        $cliente,
        $mensaje
    ) {

        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->servicio = $servicio;
        $this->contacto = $contacto;
        $this->cliente = $cliente;
        $this->mensaje = $mensaje;
    }

    // Método validar
    public function validar() {

        if (
            empty($this->nombre) ||
            empty($this->correo) ||
            empty($this->telefono) ||
            empty($this->servicio)
        ) {
            return false;
        }

        return true;
    }
}
?>