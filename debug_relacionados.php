<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debug Productos Relacionados</title>
    <style>
        body { font-family: monospace; background: #1e1e1e; color: #d4d4d4; padding: 20px; }
        .debug-log { background: #2d2d2d; padding: 20px; border-radius: 5px; margin: 10px 0; border-left: 4px solid #4ec9b0; white-space: pre-wrap; word-wrap: break-word; }
        .info { border-left-color: #569cd6; }
        .error { border-left-color: #f48771; color: #f48771; }
        .success { border-left-color: #4ec9b0; }
        h1 { color: #ce9178; }
    </style>
</head>
<body>
    <h1>🔍 Debug de Productos Relacionados</h1>
    
    <div class="debug-log info">
    Paso 1: Cargando API de productos...
    </div>

    <script>
        // Simulamos exactamente lo que hace producto_detalle.js
        const debugLog = [];

        function log(tipo, mensaje) {
            const timestamp = new Date().toLocaleTimeString();
            const logStr = `[${timestamp}] ${tipo}: ${mensaje}`;
            console.log(logStr);
            debugLog.push(logStr);
        }

        async function testCompleto() {
            log('INFO', 'Iniciando test de productos relacionados');

            // Test 1: Obtener el producto
            log('INFO', 'Paso 1: Obteniendo producto ID=1');
            let response = await fetch('../api/productos.php?action=obtener&id=1');
            let data = await response.json();
            
            if (!data.success || !data.data) {
                log('ERROR', 'No se pudo obtener el producto');
                return;
            }
            
            const producto = data.data;
            log('SUCCESS', `Producto obtenido: ${producto.nombre}, Categoría: ${producto.categoria_id}`);

            // Test 2: Obtener productos relacionados
            log('INFO', `Paso 2: Obteniendo productos de categoría ${producto.categoria_id}`);
            const url = `../api/productos.php?action=categoria&cat=${parseInt(producto.categoria_id)}`;
            log('INFO', `URL: ${url}`);
            
            response = await fetch(url);
            data = await response.json();
            
            log('INFO', `Respuesta status: ${response.status}`);
            log('INFO', `Respuesta success: ${data.success}`);
            log('INFO', `Respuesta count: ${data.count}`);
            
            if (!data.success || !data.data) {
                log('ERROR', 'No se obtuvieron productos relacionados');
                return;
            }

            log('SUCCESS', `Se obtuvieron ${data.count} productos`);

            // Test 3: Filtrar
            log('INFO', 'Paso 3: Filtrando productos');
            const productosRelacionados = data.data.filter(p => parseInt(p.id) !== parseInt(producto.id));
            log('SUCCESS', `Después de filtrar: ${productosRelacionados.length} productos`);

            // Test 4: Simular renderizado
            log('INFO', 'Paso 4: Simulando renderizado en DOM');
            const container = document.getElementById('productos-relacionados');
            
            if (!container) {
                log('ERROR', 'No se encontró #productos-relacionados en el DOM');
                return;
            }
            
            let html = '';
            productosRelacionados.slice(0, 3).forEach(producto => {
                const precio = parseFloat(producto.precio).toFixed(2);
                html += `<div style="border: 1px solid #ccc; padding: 10px; margin: 5px 0;">
                    <img src="../${producto.imagen_principal}" alt="${producto.nombre}" style="width: 100px; height: 100px; object-fit: contain;">
                    <h4>${producto.nombre}</h4>
                    <p>$${precio}</p>
                </div>`;
            });
            
            container.innerHTML = html;
            log('SUCCESS', 'HTML renderizado en el DOM');

            // Mostrar logs
            const logDiv = document.getElementById('debug-logs');
            logDiv.innerHTML = debugLog.map(l => `<div class="debug-log info">${l}</div>`).join('');
        }

        window.addEventListener('load', testCompleto);
    </script>

    <h2>Estado de la Página:</h2>
    <div id="debug-logs" class="debug-log">
        Esperando que se ejecute el test...
    </div>

    <h2>Contenedor de Productos Relacionados:</h2>
    <div id="productos-relacionados" style="background: #f0f0f0; padding: 20px; color: black;">
        <p>Cargando productos relacionados...</p>
    </div>
</body>
</html>
