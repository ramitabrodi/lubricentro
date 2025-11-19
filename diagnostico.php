<?php
/**
 * Diagnóstico de Lubricentro R/18
 * Este archivo ayuda a identificar problemas de actualización
 */

echo "<!DOCTYPE html>";
echo "<html lang='es'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Diagnóstico - Lubricentro R/18</title>";
echo "<style>";
echo "body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }";
echo ".container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }";
echo ".status { margin: 15px 0; padding: 15px; border-left: 4px solid; border-radius: 4px; }";
echo ".ok { border-color: #28a745; background: #d4edda; color: #155724; }";
echo ".error { border-color: #dc3545; background: #f8d7da; color: #721c24; }";
echo ".warning { border-color: #ffc107; background: #fff3cd; color: #856404; }";
echo "h1 { color: #333; }";
echo "code { background: #f0f0f0; padding: 2px 6px; border-radius: 3px; font-family: 'Courier New', monospace; }";
echo "</style>";
echo "</head>";
echo "<body>";
echo "<div class='container'>";
echo "<h1>🔍 Diagnóstico de Lubricentro R/18</h1>";
echo "<p>Última verificación: " . date('Y-m-d H:i:s') . "</p>";

// Verificar conexión a BD
echo "<h2>📊 Estado de la Base de Datos</h2>";
try {
    require_once 'config/database.php';
    $database = new Database();
    $db = $database->getConnection();
    
    if ($db) {
        echo "<div class='status ok'>";
        echo "✅ Conexión a BD exitosa<br>";
        echo "<code>localhost:3307 / lubricentro_r18</code>";
        echo "</div>";
        
        // Verificar tablas
        $query = "SHOW TABLES";
        $result = $db->query($query);
        $tables = $result->fetchAll(PDO::FETCH_COLUMN);
        
        echo "<div class='status ok'>";
        echo "✅ Tablas encontradas: " . count($tables) . "<br>";
        echo "Tablas: " . implode(", ", $tables);
        echo "</div>";
    } else {
        echo "<div class='status error'>❌ No se pudo conectar a la BD</div>";
    }
} catch (Exception $e) {
    echo "<div class='status error'>❌ Error: " . $e->getMessage() . "</div>";
}

// Verificar archivos CSS y JS
echo "<h2>📁 Estado de Archivos</h2>";

$files_to_check = [
    'css/styles.css',
    'JS/app.js',
    'JS/catalogo.js',
    'JS/producto_detalle.js',
    'JS/productos.js',
    'api/productos.php'
];

foreach ($files_to_check as $file) {
    if (file_exists($file)) {
        $size = filesize($file);
        $mtime = filemtime($file);
        echo "<div class='status ok'>";
        echo "✅ <code>$file</code> (" . number_format($size) . " bytes)<br>";
        echo "Modificado: " . date('Y-m-d H:i:s', $mtime);
        echo "</div>";
    } else {
        echo "<div class='status error'>❌ <code>$file</code> NO ENCONTRADO</div>";
    }
}

// Verificar conflictos de merge (archivos principales)
echo "<h2>🔀 Verificar Conflictos de Merge</h2>";
$critical_files = [
    'JS/app.js',
    'JS/catalogo.js',
    'JS/producto_detalle.js',
    'JS/productos.js',
    'pages/producto.php',
    'pages/listado_box.php',
    'pages/carrito.php'
];

$has_conflicts = false;
foreach ($critical_files as $file) {
    if (file_exists($file)) {
        $content = file_get_contents($file);
        if (strpos($content, '<<<<<<<') !== false) {
            echo "<div class='status error'>❌ Conflicto en <code>$file</code></div>";
            $has_conflicts = true;
        }
    }
}

if (!$has_conflicts) {
    echo "<div class='status ok'>✅ NO HAY CONFLICTOS DE MERGE EN ARCHIVOS CRÍTICOS</div>";
}

// Verificar caché
echo "<h2>💾 Recomendaciones de Caché</h2>";
echo "<div class='status warning'>";
echo "1. <strong>Navegador:</strong> Presiona <code>Ctrl+F5</code> (Windows) o <code>Cmd+Shift+R</code> (Mac) para limpiar caché<br>";
echo "2. <strong>Servidor:</strong> Ejecuta <code>php -S localhost:8000</code> en la carpeta del proyecto<br>";
echo "3. <strong>CSS:</strong> Se actualiza automáticamente con versión de archivo<br>";
echo "4. <strong>JS:</strong> Verifica la consola del navegador (F12) para errores";
echo "</div>";

echo "</div>";
echo "</body>";
echo "</html>";
?>
