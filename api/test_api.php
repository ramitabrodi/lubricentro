<?php
header("Content-Type: application/json; charset=UTF-8");

// Incluir archivo de conexión
require_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

if (!$db) {
    echo json_encode(['error' => 'No hay conexión a BD']);
    exit;
}

// Verificar si la tabla existe
try {
    $query = "SELECT * FROM productos LIMIT 1";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Obtener todos los productos
    $query = "SELECT * FROM productos WHERE activo = 1";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode([
        'success' => true,
        'total_productos' => count($productos),
        'productos' => $productos
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'error' => $e->getMessage(),
        'success' => false
    ]);
}
?>
