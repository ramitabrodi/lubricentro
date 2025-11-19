<?php
header('Content-Type: application/json');

require_once 'config/database.php';
$database = new Database();
$db = $database->getConnection();

$response = [];

// Test 1: Conexion
$response['conexion'] = $db ? 'OK' : 'ERROR';

// Test 2: Productos totales
try {
    $stmt = $db->query("SELECT COUNT(*) as total FROM productos");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $response['total_productos'] = $result['total'];
} catch (Exception $e) {
    $response['total_productos'] = 'ERROR: ' . $e->getMessage();
}

// Test 3: Productos destacados
try {
    $stmt = $db->query("SELECT COUNT(*) as total FROM productos WHERE destacado = 1");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $response['productos_destacados'] = $result['total'];
} catch (Exception $e) {
    $response['productos_destacados'] = 'ERROR';
}

// Test 4: Primeros 3 productos
try {
    $stmt = $db->query("SELECT id, nombre, precio, destacado FROM productos LIMIT 3");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response['muestra_productos'] = $products;
} catch (Exception $e) {
    $response['muestra_productos'] = 'ERROR';
}

echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
