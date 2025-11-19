<<<<<<< HEAD
<?php
// ============================================
// ARCHIVO: api/productos.php
// Guárdalo en: C:\xampp\htdocs\lubricentro\api\productos.php
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
=======


const API_URL = '/lubricentro/api';

// ============================================
// CARGAR PRODUCTOS DESDE LA BASE DE DATOS
// ============================================

// Obtener todos los productos
async function obtenerProductosDB() {
    try {
        const response = await fetch(`${API_URL}/productos.php?action=listar`);
        const data = await response.json();
        return data.success ? data.data : [];
    } catch (error) {
        console.error('Error al cargar productos:', error);
        return [];
    }
}

// Obtener un producto por ID
async function obtenerProductoDB(id) {
    try {
        const response = await fetch(`${API_URL}/productos.php?action=obtener&id=${id}`);
        const data = await response.json();
        return data.success ? data.data : null;
    } catch (error) {
        console.error('Error al cargar producto:', error);
        return null;
    }
}

// Obtener productos destacados
async function obtenerDestacadosDB() {
    try {
        const response = await fetch(`${API_URL}/productos.php?action=destacados`);
        const data = await response.json();
        return data.success ? data.data : [];
    } catch (error) {
        console.error('Error al cargar destacados:', error);
        return [];
    }
}

// ============================================
// FORMATEAR PRECIO
// ============================================
function formatearPrecio(precio) {
    const num = typeof precio === 'string' ? parseFloat(precio) : precio;
    return num.toLocaleString('es-AR', {
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    });
}

// ============================================
// CARGAR PRODUCTOS EN INDEX.HTML
// ============================================
async function cargarProductosIndex() {
    const carousel = document.querySelector('.products-carousel');
    if (!carousel) return;

    const productos = await obtenerDestacadosDB();
    carousel.innerHTML = '';

    productos.forEach(producto => {
        const badge = producto.destacado == 1 ? '<div class="product-badge">Más Vendido</div>' : '';
        const premium = producto.premium == 1 ? '<div class="product-badge premium">Premium</div>' : '';
        
        const slide = `
            <div>
                <div class="product-card">
                    ${badge}${premium}
                    <img src="${producto.imagen_principal}" alt="${producto.nombre}">
                    <div class="product-info">
                        <h4>${producto.nombre}</h4>
                        <p class="product-brand">${producto.marca} - ${producto.viscosidad || ''}</p>
                        <div class="product-footer">
                            <span class="product-price">$${formatearPrecio(producto.precio)}</span>
                            <button onclick="agregarAlCarrito({
                                id:'${producto.codigo}', 
                                nombre:'${producto.nombre} ${producto.marca}', 
                                precio:'$${formatearPrecio(producto.precio)}'
                            })" class="btn-add-cart">
                                <span>+</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        carousel.innerHTML += slide;
    });

    // Reinicializar Slick después de cargar
    if (typeof $.fn.slick !== 'undefined') {
        $('.products-carousel').slick('unslick');
        $('.products-carousel').slick({
            dots: true,
            infinite: true,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            responsive: [
                { breakpoint: 1024, settings: { slidesToShow: 2 } },
                { breakpoint: 768, settings: { slidesToShow: 1, arrows: false } }
            ]
        });
    }
}

// ============================================
// CARGAR PRODUCTOS EN LISTADO_BOX.HTML
// ============================================
async function cargarProductosBox() {
    const grid = document.querySelector('.products-grid');
    if (!grid) return;

    const productos = await obtenerProductosDB();
    grid.innerHTML = '';

    productos.forEach(producto => {
        const badge = producto.destacado == 1 ? '<div class="product-badge">Más Vendido</div>' : '';
        const premium = producto.premium == 1 ? '<div class="product-badge premium">Premium</div>' : '';
        
        const card = `
            <div class="product-card">
                ${badge}${premium}
                <img src="../${producto.imagen_principal}" alt="${producto.nombre}">
                <div class="product-info">
                    <h4>${producto.nombre}</h4>
                    <p class="product-brand">${producto.marca} - ${producto.viscosidad || ''}</p>
                    <div class="product-footer">
                        <span class="product-price">$${formatearPrecio(producto.precio)}</span>
                        <button onclick="agregarAlCarrito({
                            id:'${producto.codigo}', 
                            nombre:'${producto.nombre} ${producto.marca}', 
                            precio:'$${formatearPrecio(producto.precio)}'
                        })" class="btn-add-cart">
                            <span>+</span>
                        </button>
                    </div>
                    <a href="producto.html?id=${producto.id}" class="btn-view-details">Ver Detalles</a>
                </div>
            </div>
        `;
        grid.innerHTML += card;
    });
}

// ============================================
// CARGAR TABLA EN LISTADO_TABLA.HTML
// ============================================
async function cargarTablaProductos() {
    const tbody = document.querySelector('.products-table tbody');
    if (!tbody) return;

    const productos = await obtenerProductosDB();
    tbody.innerHTML = '';

    productos.forEach(producto => {
        const row = `
            <tr>
                <td data-label="Código">${producto.codigo}</td>
                <td data-label="Nombre">${producto.nombre}</td>
                <td data-label="Marca">${producto.marca}</td>
                <td data-label="Tipo">${producto.tipo || '-'}</td>
                <td data-label="Viscosidad">${producto.viscosidad || '-'}</td>
                <td data-label="Presentación">${producto.presentacion || '-'}</td>
                <td data-label="Precio" class="price-cell">$${formatearPrecio(producto.precio)}</td>
                <td data-label="Acción">
                    <a href="producto.html?id=${producto.id}" class="btn btn-small btn-table">Ver</a>
                </td>
            </tr>
        `;
        tbody.innerHTML += row;
    });
}

// ============================================
// CARGAR DETALLE EN PRODUCTO.HTML
// ============================================
async function cargarDetalleProducto() {
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');
    
    if (!id) {
        window.location.href = 'listado_box.html';
        return;
    }

    const producto = await obtenerProductoDB(id);
    
    if (!producto) {
        alert('Producto no encontrado');
        window.location.href = 'listado_box.html';
        return;
    }

    // Actualizar información
    document.getElementById('codigo-producto').textContent = `Código: ${producto.codigo}`;
    document.getElementById('nombre-producto').textContent = producto.nombre;
    document.getElementById('precio-producto').textContent = `$${formatearPrecio(producto.precio)}`;
    document.getElementById('descripcion-producto').textContent = producto.descripcion || 'Descripción no disponible';
    document.getElementById('breadcrumb-nombre').textContent = producto.nombre;

    // Especificaciones
    const detalles = document.getElementById('detalles-lista');
    detalles.innerHTML = `
        <li><span class="spec-icon">✓</span> Marca: ${producto.marca}</li>
        <li><span class="spec-icon">✓</span> Categoría: ${producto.categoria || 'General'}</li>
        <li><span class="spec-icon">✓</span> Tipo: ${producto.tipo || 'N/A'}</li>
        <li><span class="spec-icon">✓</span> Viscosidad: ${producto.viscosidad || 'N/A'}</li>
        <li><span class="spec-icon">✓</span> Presentación: ${producto.presentacion || 'N/A'}</li>
        <li><span class="spec-icon">✓</span> Stock: ${producto.stock} unidades</li>
    `;

    // Configurar botón agregar
    const btnAgregar = document.getElementById('btn-agregar');
    if (btnAgregar) {
        btnAgregar.onclick = function() {
            agregarAlCarrito({
                id: producto.codigo,
                nombre: `${producto.nombre} ${producto.marca}`,
                precio: `$${formatearPrecio(producto.precio)}`
            });
        };
    }

    // Cargar galería
    const gallery = document.getElementById('product-gallery');
    const thumbnails = document.getElementById('product-thumbnails');
    
    if (gallery && thumbnails) {
        const imagenes = [producto.imagen_principal, producto.imagen_2, producto.imagen_3]
            .filter(img => img && img !== '');
        
        imagenes.forEach(img => {
            gallery.innerHTML += `<div><img src="../${img}" alt="${producto.nombre}"></div>`;
            thumbnails.innerHTML += `<div><img src="../${img}" alt="${producto.nombre}"></div>`;
        });
    }
}

// ============================================
// CARGAR SELECT EN COMPRAR.HTML
// ============================================
async function cargarSelectProductos() {
    const select = document.getElementById('producto');
    if (!select) return;

    const productos = await obtenerProductosDB();
    
    productos.forEach(producto => {
        const option = document.createElement('option');
        option.value = `${producto.nombre} ${producto.marca}`;
        option.textContent = `${producto.nombre} ${producto.marca} - $${formatearPrecio(producto.precio)}`;
        select.appendChild(option);
    });
}

// ============================================
// AUTO-INICIALIZAR SEGÚN LA PÁGINA
// ============================================
document.addEventListener('DOMContentLoaded', async function() {
    const path = window.location.pathname;
    const page = path.split('/').pop();

    // Esperar a que el documento esté listo
    await new Promise(resolve => setTimeout(resolve, 100));

    if (page === 'index.html' || page === '') {
        await cargarProductosIndex();
    } else if (page === 'listado_box.html') {
        await cargarProductosBox();
    } else if (page === 'listado_tabla.html') {
        await cargarTablaProductos();
    } else if (page === 'producto.html') {
        await cargarDetalleProducto();
    } else if (page === 'comprar.html') {
        await cargarSelectProductos();
    }
});
>>>>>>> 0e30cedfb2c0af2541cda517b60237f5e50d940c
