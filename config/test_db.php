<?php
// test_db.php - Código corregido y funcional
$conexion = new mysqli("localhost:3307", "root", "", "lubricentro_r18");

if ($conexion->connect_error) {
    echo "Error al conectar: " . $conexion->connect_error;
} else {
    echo "¡Conectado correctamente a la base de datos lubricentro!";
}
?>