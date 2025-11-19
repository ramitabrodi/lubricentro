<?php
// ============================================
<<<<<<< HEAD
// ARCHIVO: api/productos.php
// Guárdalo en: C:\xampp\htdocs\lubricentro\api\productos.php
=======
// ARCHIVO: api/productos.php - VERSIÓN CORREGIDA
>>>>>>> b114ffd41ff0aacf59517d6d4649fd7f6c6b3ac3
// ============================================

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Incluir archivo de conexión
require_once '../config/database.php';

// Crear conexión
$database = new Database();
$db = $database->getConnection();

// Obtener acción desde la URL
$action = isset($_GET['action']) ? $_GET['action'] : 'listar';

// ACCIONES DISPONIBLES
if ($action == 'listar') {
    // Listar todos los productos
    $query = "SELECT * FROM productos WHERE activo = 1 ORDER BY destacado DESC, nombre ASC";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode([
        'success' => true,
        'count' => count($productos),
        'data' => $productos
    ]);
    
} elseif ($action == 'obtener' && isset($_GET['id'])) {
    // Obtener un producto por ID
    $id = $_GET['id'];
    $query = "SELECT p.*, c.nombre as categoria 
              FROM productos p 
              LEFT JOIN categorias c ON p.categoria_id = c.id 
              WHERE p.id = :id AND p.activo = 1";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($producto) {
        echo json_encode([
            'success' => true,
            'data' => $producto
        ]);
    } else {
        http_response_code(404);
        echo json_encode([
            'success' => false,
            'message' => 'Producto no encontrado'
        ]);
    }
    
} elseif ($action == 'destacados') {
    // Obtener productos destacados
    $query = "SELECT * FROM productos WHERE destacado = 1 AND activo = 1 LIMIT 6";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode([
        'success' => true,
        'count' => count($productos),
        'data' => $productos
    ]);
    
} elseif ($action == 'categoria' && isset($_GET['cat'])) {
    // Obtener productos por categoría
    $categoria_id = $_GET['cat'];
    $query = "SELECT p.* FROM productos p 
              WHERE p.categoria_id = :categoria_id AND p.activo = 1";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':categoria_id', $categoria_id);
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode([
        'success' => true,
        'count' => count($productos),
        'data' => $productos
    ]);
    
} else {
    // Acción no válida
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Acción no válida'
    ]);
}
?>