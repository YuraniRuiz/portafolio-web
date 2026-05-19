<?php

include("conexion.php");
include("Contacto.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // RECIBIR DATOS
    $nombre    = trim($_POST["nombre"]);
    $correo    = trim($_POST["correo"]);
    $telefono  = trim($_POST["telefono"]);
    $direccion = trim($_POST["direccion"]);
    $servicio  = trim($_POST["servicio"]);
    $contacto  = isset($_POST["contacto"]) ? $_POST["contacto"] : "";
    $cliente   = isset($_POST["cliente"]) ? 1 : 0;
    $mensaje   = trim($_POST["mensaje"]);

    // CREAR OBJETO
    $nuevoContacto = new Contacto(
        $nombre,
        $correo,
        $telefono,
        $direccion,
        $servicio,
        $contacto,
        $cliente,
        $mensaje
    );

    // VALIDAR DATOS
    if ($nuevoContacto->validar()) {

        // INSERT
        $sql = "INSERT INTO contactos
        (nombre, correo, telefono, direccion, servicio, contacto, cliente, mensaje)

        VALUES

        (
            '$nombre',
            '$correo',
            '$telefono',
            '$direccion',
            '$servicio',
            '$contacto',
            '$cliente',
            '$mensaje'
        )";

        if ($conexion->query($sql) === TRUE) {

            echo "<h2 style='color:green;'>
            Información guardada correctamente
            </h2>";

        } else {

            echo "<h2 style='color:red;'>
            Error al guardar:
            " . $conexion->error . "
            </h2>";
        }

    } else {

        echo "<h2 style='color:red;'>
        Debes llenar todos los campos obligatorios.
        </h2>";
    }
}
?>