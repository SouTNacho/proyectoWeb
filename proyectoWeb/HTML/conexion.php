<?php
function conectar_bd() {

    $host = 'localhost';
    
    $usuario = 'root';

    $clave = '';

    $base_datos = 'bluecost';

    $conn = new mysqli($host, $usuario, $clave, $base_datos);

    if ($conn -> connect_error) {
        die('CONEXION FALLIDA: ' . $conn -> connect_error);
    }

    return $conn;
}
?>