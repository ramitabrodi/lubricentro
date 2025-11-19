<?php
header("Content-Type: text/html; charset=UTF-8");

echo "<h2>🔍 Diagnóstico de Base de Datos</h2>";
echo "<hr>";

// Incluir archivo de conexión
require_once 'database.php';

$database = new Database();
$db = $database->getConnection();

if ($db) {
    echo "<p style='color: green;'><strong>✅ Conexión exitosa a la base de datos</strong></p>";
    
    // Verificar tablas
    try {
        $query = "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'lubricentro_r18'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if (count($tables) > 0) {
            echo "<p><strong>Tablas encontradas:</strong></p>";
            echo "<ul>";
            foreach ($tables as $table) {
                echo "<li>" . $table['TABLE_NAME'] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p style='color: orange;'><strong>⚠️ No hay tablas en la base de datos</strong></p>";
        }
        
        // Verificar tabla productos
        $query = "SELECT COUNT(*) as total FROM productos";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<p><strong>Productos en BD:</strong> " . $result['total'] . "</p>";
        
    } catch (PDOException $e) {
        echo "<p style='color: red;'><strong>Error al consultar:</strong> " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p style='color: red;'><strong>❌ Error de conexión a la base de datos</strong></p>";
}

?>
