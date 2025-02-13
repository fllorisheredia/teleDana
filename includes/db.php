<?php
$conexion = new mysqli("localhost", "root", "1234", "tiendadana",3307);
if ($conexion->connect_error) {
 die("Error de conexión: " . $conexion->connect_error);
}
?> 