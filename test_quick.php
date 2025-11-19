<?php
/**
 * TEST RÁPIDO - Verifica si todo está funcionando
 */
header('Content-Type: application/json');

// Prueba 1: Conectar a BD
echo json_encode([
    'test' => '1. Conexión a BD',
    'resultado' => 'Intentando conectar...'
], JSON_PRETTY_PRINT);

require_once 'config/database.php';
$database = new Database();
$db = $database->getConnection();

if (!$db) {
    die(json_encode(['error' => 'No se pudo conectar a la BD']));
}

// Prueba 2: Verificar tablas
$query = "SHOW TABLES";
$stmt = $db->query($query);
$tables = $stmt->fetchAll(PDO::FETCH_COLUMN);

echo "\n=== TABLAS EN LA BD ===\n";
print_r($tables);

// Prueba 3: Verificar estructura de productos
if (in_array('productos', $tables)) {
    echo "\n=== ESTRUCTURA DE PRODUCTOS ===\n";
    $query = "DESCRIBE productos";
    $stmt = $db->query($query);
    $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($columns);
    
    // Prueba 4: Contar productos
    $query = "SELECT COUNT(*) as total FROM productos";
    $stmt = $db->query($query);
    $count = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "\n=== PRODUCTOS EN BD ===\n";
    echo "Total de productos: " . $count['total'] . "\n";
    
    // Prueba 5: Listar primeros 3 productos
    if ($count['total'] > 0) {
        echo "\n=== PRIMEROS 3 PRODUCTOS ===\n";
        $query = "SELECT * FROM productos LIMIT 3";
        $stmt = $db->query($query);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r($products);
    }
} else {
    echo "\n❌ ERROR: La tabla 'productos' no existe en la BD\n";
    echo "Tablas disponibles: " . implode(', ', $tables) . "\n";
}

// Prueba 6: Verificar API
echo "\n=== RESPUESTA DE API ===\n";
$response = file_get_contents('http://localhost/lubricentro/api/productos.php?action=listar');
echo "API Response:\n";
echo $response . "\n";
?>
