<?php
header("Content-Type: text/html; charset=UTF-8");

echo "<h2>🔍 Diagnóstico Avanzado de Conexión MySQL</h2>";
echo "<hr>";

// Opción 1: Usando localhost
echo "<h3>Intentando conexión a localhost:3306</h3>";
try {
    $db = new PDO(
        "mysql:host=localhost;port=3306",
        "root",
        ""
    );
    echo "<p style='color: green;'><strong>✅ Conexión exitosa a localhost:3306</strong></p>";
} catch (PDOException $e) {
    echo "<p style='color: red;'><strong>❌ Error:</strong> " . $e->getMessage() . "</p>";
}

// Opción 2: Usando 127.0.0.1
echo "<h3>Intentando conexión a 127.0.0.1:3306</h3>";
try {
    $db = new PDO(
        "mysql:host=127.0.0.1;port=3306",
        "root",
        ""
    );
    echo "<p style='color: green;'><strong>✅ Conexión exitosa a 127.0.0.1:3306</strong></p>";
} catch (PDOException $e) {
    echo "<p style='color: red;'><strong>❌ Error:</strong> " . $e->getMessage() . "</p>";
}

// Opción 3: Usando socket Unix
echo "<h3>Intentando conexión con socket Unix</h3>";
try {
    $db = new PDO(
        "mysql:unix_socket=/xampp/mysql/mysql.sock",
        "root",
        ""
    );
    echo "<p style='color: green;'><strong>✅ Conexión exitosa con socket Unix</strong></p>";
} catch (PDOException $e) {
    echo "<p style='color: red;'><strong>❌ Error:</strong> " . $e->getMessage() . "</p>";
}

// Opción 4: Usando puerto 3307 (alternativo)
echo "<h3>Intentando conexión a localhost:3307</h3>";
try {
    $db = new PDO(
        "mysql:host=localhost;port=3307",
        "root",
        ""
    );
    echo "<p style='color: green;'><strong>✅ Conexión exitosa a localhost:3307</strong></p>";
} catch (PDOException $e) {
    echo "<p style='color: red;'><strong>❌ Error:</strong> " . $e->getMessage() . "</p>";
}

echo "<hr>";
echo "<p><strong>📝 Instrucciones:</strong></p>";
echo "<ul>";
echo "<li>Abre XAMPP Control Panel</li>";
echo "<li>Asegúrate de que MySQL esté <strong>iniciado</strong> (botón Start)</li>";
echo "<li>Recarga esta página</li>";
echo "</ul>";

?>
