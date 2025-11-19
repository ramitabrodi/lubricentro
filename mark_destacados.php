<?php
/**
 * Script para marcar productos como destacados
 * Ejecuta esto: http://localhost/lubricentro/mark_destacados.php
 */

require_once 'config/database.php';

try {
    $database = new Database();
    $db = $database->getConnection();
    
    if (!$db) {
        die('Error: No se pudo conectar a la BD');
    }

    // Actualizar los primeros 6 productos como destacados
    $query = "UPDATE productos SET destacado = 1 LIMIT 6";
    $stmt = $db->prepare($query);
    $stmt->execute();
    
    echo "<h1>✅ Operación exitosa</h1>";
    echo "<p>Se marcaron como destacados los primeros 6 productos.</p>";
    
    // Verificar
    $query = "SELECT COUNT(*) as total FROM productos WHERE destacado = 1";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo "<p>Total de productos destacados: <strong>" . $result['total'] . "</strong></p>";
    echo "<p><a href='index.php'>Volver a Inicio</a></p>";
    
} catch (Exception $e) {
    echo "<h1>❌ Error</h1>";
    echo "<p>" . $e->getMessage() . "</p>";
}
?>
