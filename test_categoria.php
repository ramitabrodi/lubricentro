<?php
// Test para verificar que el endpoint de categoría funciona
header("Content-Type: application/json; charset=UTF-8");

require_once 'config/database.php';

$database = new Database();
$db = $database->getConnection();

// Test 1: Listar todos los productos
echo "=== TEST 1: TODOS LOS PRODUCTOS ===\n";
$query = "SELECT id, nombre, categoria_id, marca FROM productos WHERE activo = 1";
$stmt = $db->prepare($query);
$stmt->execute();
$todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($todos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n\n";

// Test 2: Productos por categoría (via SQL directo)
echo "=== TEST 2: PRODUCTOS CATEGORÍA ID = 1 (SQL DIRECTO) ===\n";
$query = "SELECT p.* FROM productos p WHERE p.categoria_id = 1 AND p.activo = 1";
$stmt = $db->prepare($query);
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($productos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n\n";

// Test 3: Productos por categoría (via prepared statement)
echo "=== TEST 3: PRODUCTOS CATEGORÍA ID = 1 (PREPARED STATEMENT) ===\n";
$categoria_id = 1;
$query = "SELECT p.* FROM productos p WHERE p.categoria_id = :categoria_id AND p.activo = 1";
$stmt = $db->prepare($query);
$stmt->bindParam(':categoria_id', $categoria_id);
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($productos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n\n";

// Test 4: Simular el endpoint completo
echo "=== TEST 4: ENDPOINT COMPLETO SIMULADO ===\n";
$_GET['action'] = 'categoria';
$_GET['cat'] = '1';

$action = $_GET['action'];
$categoria_id = $_GET['cat'];
$query = "SELECT p.* FROM productos p 
          WHERE p.categoria_id = :categoria_id AND p.activo = 1";
$stmt = $db->prepare($query);
$stmt->bindParam(':categoria_id', $categoria_id);
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$response = [
    'success' => true,
    'count' => count($productos),
    'data' => $productos
];
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n";

// Test 5: Verificar categorías existentes
echo "=== TEST 5: CATEGORÍAS DISPONIBLES ===\n";
$query = "SELECT id, nombre FROM categorias";
$stmt = $db->prepare($query);
$stmt->execute();
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($categorias, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n";
?>
