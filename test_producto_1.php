<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación - Producto 1</title>
    <link rel="stylesheet" href="./css/styles.css">
    <style>
        .test-info { position: fixed; top: 20px; right: 20px; background: #fff; border: 2px solid #007bff; padding: 15px; border-radius: 5px; max-width: 300px; z-index: 9999; box-shadow: 0 0 20px rgba(0,0,0,0.2); font-size: 12px; max-height: 400px; overflow-y: auto; }
        .test-info h3 { margin: 0 0 10px 0; color: #007bff; }
        .test-info p { margin: 5px 0; color: #333; }
        .test-success { color: green; font-weight: bold; }
        .test-error { color: red; font-weight: bold; }
        .test-info code { background: #f0f0f0; padding: 2px 5px; border-radius: 3px; display: block; margin-top: 5px; }
    </style>
</head>
<body>

<!-- HEADER -->
<header>
  <div class="nav-container">
    <h1 class="logo">🔧 Lubricentro R/18</h1>
    <button class="menu-toggle" id="menu-toggle">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <nav>
      <ul class="nav-menu" id="nav-menu">
        <li><a href="./index.php" class="nav-link">Inicio</a></li>
        <li><a href="./pages/listado_tabla.php" class="nav-link">Productos</a></li>
        <li><a href="./pages/listado_box.php" class="nav-link">Catálogo</a></li>
        <li><a href="./pages/comprar.php" class="nav-link">Comprar</a></li>
        <li><a href="./pages/carrito.php" class="nav-link cart-link">
          <span class="cart-icon">🛒</span>
          <span class="cart-badge" id="cart-count">0</span>
        </a></li>
      </ul>
    </nav>
  </div>
</header>

<!-- Simulación de la página de producto -->
<main class="product-detail-page">
  <div class="container">
    <div class="product-detail-grid">
      <div class="product-image-section">
        <div class="product-gallery" id="product-gallery">
          <p>Cargando imagen...</p>
        </div>
      </div>
      <div class="product-info-section">
        <p id="codigo-producto" class="product-code"></p>
        <h1 id="nombre-producto" class="product-title">Cargando producto...</h1>
        <div class="product-rating">
          ⭐⭐⭐⭐⭐ <span class="rating-count">(128 valoraciones)</span>
        </div>
        <p class="product-price-large" id="precio-producto">$0.00</p>
        <p id="descripcion-producto" class="product-description"></p>
        <div class="product-actions">
          <button class="btn btn-primary btn-large" id="btn-agregar">
            <span>🛒</span> Agregar al Carrito
          </button>
          <a href="./pages/comprar.php" class="btn btn-outline-dark btn-large">
            Comprar Ahora
          </a>
        </div>
      </div>
    </div>

    <!-- Especificaciones -->
    <div class="product-specs">
      <h2 class="specs-title">📋 Especificaciones Técnicas</h2>
      <div class="specs-grid">
        <ul id="detalles-lista" class="specs-list"></ul>
      </div>
    </div>

    <!-- AQUÍ ESTÁ EL CONTENEDOR CRÍTICO -->
    <div class="related-products">
      <h2 class="section-title">Productos Relacionados</h2>
      <p class="section-subtitle">También te puede interesar</p>
      
      <div class="products-grid-small" id="productos-relacionados">
        <p>Cargando productos relacionados...</p>
      </div>
    </div>
  </div>
</main>

<footer>
  <div class="container">
    <div class="footer-content">
      <div class="footer-section">
        <h3>🔧 Lubricentro R/18</h3>
        <p>Tu aliado en el mantenimiento automotriz desde 2010</p>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2025 Lubricentro R/18. Todos los derechos reservados.</p>
    </div>
  </div>
</footer>

<!-- Test Info Panel -->
<div class="test-info">
    <h3>📊 Test de Carga</h3>
    <div id="test-messages"></div>
</div>

<script>
    // Sistema de logs para debugging
    const testMessages = [];
    
    function testLog(tipo, msg) {
        const time = new Date().toLocaleTimeString();
        const fullMsg = `[${time}] ${tipo}: ${msg}`;
        testMessages.push(fullMsg);
        console.log(fullMsg);
        
        const div = document.getElementById('test-messages');
        if (div) {
            const className = tipo === 'ERROR' ? 'test-error' : (tipo === 'SUCCESS' ? 'test-success' : '');
            div.innerHTML += `<p class="${className}">${msg}</p>`;
        }
    }

    window.addEventListener('load', function() {
        testLog('INFO', 'Página cargada');
        
        // Verificar contenedores
        const contentContainers = [
            '#nombre-producto',
            '#precio-producto',
            '#detalles-lista',
            '#productos-relacionados'
        ];
        
        contentContainers.forEach(sel => {
            const el = document.querySelector(sel);
            if (el) {
                testLog('SUCCESS', `✓ Elemento ${sel} encontrado`);
            } else {
                testLog('ERROR', `✗ Elemento ${sel} NO encontrado`);
            }
        });
    });
</script>

<!-- Script de producto detail - VERSIÓN DE PRUEBA -->
<script>
// ==== SISTEMA DE CARRITO ====
let carrito = JSON.parse(localStorage.getItem("carrito")) || [];

function actualizarContadorCarrito() {
    const contadores = document.querySelectorAll("#cart-count");
    if (contadores.length > 0) {
        const totalItems = carrito.reduce((acc, item) => acc + (item.cantidad || 1), 0);
        contadores.forEach(contador => {
            contador.textContent = totalItems;
        });
    }
}

function obtenerIdProducto() {
    const params = new URLSearchParams(window.location.search);
    return params.get('id');
}

function obtenerRutaAPI() {
    return './api/productos.php';
}

async function obtenerProducto(id) {
    try {
        const rutaAPI = obtenerRutaAPI() + '?action=obtener&id=' + parseInt(id);
        testLog('INFO', `Obteniendo producto: ${rutaAPI}`);
        const response = await fetch(rutaAPI);
        if (!response.ok) {
            throw new Error('Error HTTP ' + response.status);
        }
        const data = await response.json();
        testLog('INFO', `Producto obtenido: ${data.data?.nombre || 'ERROR'}`);
        if (data.success && data.data) {
            return data.data;
        }
        return null;
    } catch (error) {
        testLog('ERROR', `No se pudo obtener el producto: ${error.message}`);
        return null;
    }
}

async function obtenerProductosRelacionados(categoriaId, productoActualId) {
    try {
        const categoriaIdInt = parseInt(categoriaId);
        const productoIdInt = parseInt(productoActualId);
        const rutaAPI = obtenerRutaAPI() + '?action=categoria&cat=' + categoriaIdInt;
        testLog('INFO', `Obteniendo productos de categoría ${categoriaIdInt}`);
        const response = await fetch(rutaAPI);
        if (!response.ok) {
            throw new Error('Error HTTP ' + response.status);
        }
        const data = await response.json();
        testLog('INFO', `API devolvió ${data.count} productos`);
        if (data.success && data.data) {
            const relacionados = data.data.filter(p => parseInt(p.id) !== productoIdInt);
            testLog('SUCCESS', `${relacionados.length} productos relacionados después de filtrar`);
            return relacionados;
        }
        return [];
    } catch (error) {
        testLog('ERROR', `Error obteniendo relacionados: ${error.message}`);
        return [];
    }
}

function cargarProductosRelacionados(productos) {
    const container = document.getElementById('productos-relacionados');
    
    if (!container) {
        testLog('ERROR', 'Contenedor #productos-relacionados no encontrado');
        return;
    }
    
    testLog('INFO', `Cargando ${productos?.length || 0} productos en DOM`);
    
    if (!productos || productos.length === 0) {
        container.innerHTML = '<p>No hay productos relacionados</p>';
        testLog('WARN', 'Sin productos relacionados');
        return;
    }
    
    let html = '';
    productos.slice(0, 3).forEach(producto => {
        html += `
            <div class="product-card-small">
                <img src="./${producto.imagen_principal}" alt="${producto.nombre}">
                <h4>${producto.nombre}</h4>
                <p class="price">$${parseFloat(producto.precio).toFixed(2)}</p>
                <a href="./pages/producto.php?id=${producto.id}" class="btn btn-small">Ver Detalles</a>
            </div>
        `;
    });
    
    container.innerHTML = html;
    testLog('SUCCESS', '✓ Productos renderizados en el DOM');
}

async function cargarDetallesProducto() {
    const productoId = obtenerIdProducto();
    
    if (!productoId) {
        testLog('ERROR', 'No hay ID de producto en la URL');
        document.getElementById('nombre-producto').textContent = 'Producto no encontrado';
        return;
    }
    
    testLog('INFO', `Cargando detalles del producto ID: ${productoId}`);
    const producto = await obtenerProducto(productoId);
    
    if (!producto) {
        testLog('ERROR', 'No se pudo obtener el producto');
        document.getElementById('nombre-producto').textContent = 'Producto no encontrado';
        return;
    }
    
    // Llenar datos
    document.getElementById('codigo-producto').textContent = 'Código: ' + producto.codigo;
    document.getElementById('nombre-producto').textContent = producto.nombre;
    document.getElementById('precio-producto').textContent = '$' + parseFloat(producto.precio).toFixed(2);
    document.getElementById('descripcion-producto').textContent = producto.descripcion;
    testLog('SUCCESS', '✓ Datos del producto cargados');
    
    // Imagen
    const galeriaHTML = `<div><img src="./${producto.imagen_principal}" alt="${producto.nombre}" style="width: 100%; border-radius: 8px;"></div>`;
    document.getElementById('product-gallery').innerHTML = galeriaHTML;
    
    // Especificaciones
    let especificacionesHTML = '';
    especificacionesHTML += `<li><strong>Marca:</strong> ${producto.marca}</li>`;
    especificacionesHTML += `<li><strong>Tipo:</strong> ${producto.tipo}</li>`;
    especificacionesHTML += `<li><strong>Presentación:</strong> ${producto.presentacion}</li>`;
    especificacionesHTML += `<li><strong>Stock:</strong> ${producto.stock} unidades</li>`;
    document.getElementById('detalles-lista').innerHTML = especificacionesHTML;
    
    // Botón
    document.getElementById('btn-agregar').addEventListener('click', function() {
        alert('Agregado al carrito');
    });
    
    // AHORA CARGAR PRODUCTOS RELACIONADOS
    if (producto.categoria_id) {
        testLog('INFO', `Iniciando carga de productos relacionados`);
        const productosRelacionados = await obtenerProductosRelacionados(producto.categoria_id, productoId);
        cargarProductosRelacionados(productosRelacionados);
    } else {
        testLog('WARN', 'El producto no tiene categoría');
    }
}

// DISPARADOR
document.addEventListener('DOMContentLoaded', () => {
    testLog('INFO', 'DOMContentLoaded disparado');
    cargarDetallesProducto();
});
</script>

</body>
</html>
