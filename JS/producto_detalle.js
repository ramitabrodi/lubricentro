// ==== SISTEMA DE CARRITO ====
let carrito = JSON.parse(localStorage.getItem("carrito")) || [];

// Actualizar contador del carrito
function actualizarContadorCarrito() {
    const contadores = document.querySelectorAll("#cart-count");
    if (contadores.length > 0) {
        const totalItems = carrito.reduce((acc, item) => acc + (item.cantidad || 1), 0);
        contadores.forEach(contador => {
            contador.textContent = totalItems;
        });
    }
}

// Obtener ID del producto desde la URL
function obtenerIdProducto() {
    const params = new URLSearchParams(window.location.search);
    return params.get('id');
}

// Detectar ruta base
function obtenerRutaAPI() {
    return '../api/productos.php';
}

// Obtener producto individual
async function obtenerProducto(id) {
    try {
        const rutaAPI = obtenerRutaAPI() + '?action=obtener&id=' + parseInt(id);
        console.log('Obteniendo producto con ID:', parseInt(id));
        console.log('URL API:', rutaAPI);
        const response = await fetch(rutaAPI);
        if (!response.ok) {
            throw new Error('Error al obtener producto: ' + response.status);
        }
        const data = await response.json();
        console.log('Respuesta de API:', data);
        if (data.success && data.data) {
            return data.data;
        }
        return null;
    } catch (error) {
        console.error('Error obteniendo producto:', error);
        return null;
    }
}

// Obtener productos relacionados (misma categoría)
async function obtenerProductosRelacionados(categoriaId, productoActualId) {
    try {
        const categoriaIdInt = parseInt(categoriaId);
        const productoIdInt = parseInt(productoActualId);
        const rutaAPI = obtenerRutaAPI() + '?action=categoria&cat=' + categoriaIdInt;
        console.log('Obteniendo productos relacionados con categoría:', categoriaIdInt);
        console.log('Producto actual ID:', productoIdInt);
        console.log('URL API:', rutaAPI);
        const response = await fetch(rutaAPI);
        if (!response.ok) {
            throw new Error('Error al obtener productos relacionados: ' + response.status);
        }
        const data = await response.json();
        console.log('Respuesta de API:', data);
        if (data.success && data.data) {
            // Filtrar para no incluir el producto actual
            const relacionados = data.data.filter(p => parseInt(p.id) !== productoIdInt);
            console.log('Productos relacionados después de filtrar:', relacionados);
            return relacionados;
        }
        console.warn('API respondió sin éxito:', data);
        return [];
    } catch (error) {
        console.error('Error obteniendo productos relacionados:', error);
        return [];
    }
}

// Cargar detalles del producto
async function cargarDetallesProducto() {
    const productoId = obtenerIdProducto();
    
    if (!productoId) {
        document.getElementById('nombre-producto').textContent = 'Producto no encontrado';
        return;
    }
    
    const producto = await obtenerProducto(productoId);
    
    if (!producto) {
        document.getElementById('nombre-producto').textContent = 'Producto no encontrado';
        return;
    }
    
    console.log('Producto cargado:', producto);
    
    // Llenar datos del producto
    document.getElementById('codigo-producto').textContent = 'Código: ' + producto.codigo;
    document.getElementById('nombre-producto').textContent = producto.nombre;
    document.getElementById('breadcrumb-nombre').textContent = producto.nombre;
    document.getElementById('precio-producto').textContent = '$' + parseFloat(producto.precio).toFixed(2);
    document.getElementById('descripcion-producto').textContent = producto.descripcion;
    
    // Cargar galería de imágenes
    const galeriaHTML = `
        <div>
            <img src="../${producto.imagen_principal}" alt="${producto.nombre}" style="width: 100%; border-radius: 8px;">
        </div>
    `;
    document.getElementById('product-gallery').innerHTML = galeriaHTML;
    
    // Cargar especificaciones técnicas
    let especificacionesHTML = '';
    especificacionesHTML += `<li><strong>Marca:</strong> ${producto.marca}</li>`;
    especificacionesHTML += `<li><strong>Tipo:</strong> ${producto.tipo}</li>`;
    if (producto.viscosidad && producto.viscosidad !== '-') {
        especificacionesHTML += `<li><strong>Viscosidad:</strong> ${producto.viscosidad}</li>`;
    }
    especificacionesHTML += `<li><strong>Presentación:</strong> ${producto.presentacion}</li>`;
    especificacionesHTML += `<li><strong>Stock disponible:</strong> ${producto.stock} unidades</li>`;
    
    document.getElementById('detalles-lista').innerHTML = especificacionesHTML;
    
    // Botón agregar al carrito
    document.getElementById('btn-agregar').addEventListener('click', function() {
        agregarAlCarrito(producto);
    });
    
    // Cargar productos relacionados
    if (producto.categoria_id) {
        console.log('Iniciando carga de productos relacionados...');
        const productosRelacionados = await obtenerProductosRelacionados(producto.categoria_id, productoId);
        console.log('Productos relacionados obtenidos en cargarDetallesProducto:', productosRelacionados);
        cargarProductosRelacionados(productosRelacionados);
    } else {
        console.warn('El producto no tiene categoría_id');
        document.getElementById('productos-relacionados').innerHTML = '<p>No hay productos relacionados disponibles</p>';
    }
}

// Cargar productos relacionados en la UI
function cargarProductosRelacionados(productos) {
    const container = document.getElementById('productos-relacionados');
    
    console.log('Contenedor encontrado:', container);
    console.log('Productos a mostrar:', productos);
    
    if (!container) {
        console.error('No se encontró el contenedor #productos-relacionados');
        return;
    }
    
    if (!productos || productos.length === 0) {
        console.warn('No hay productos relacionados para mostrar');
        container.innerHTML = '<p>No hay productos relacionados</p>';
        return;
    }
    
    let html = '';
    const productosAMostrar = productos.slice(0, 3);
    console.log('Productos a mostrar (primeros 3):', productosAMostrar);
    
    productosAMostrar.forEach(producto => {
        const precioFormato = parseFloat(producto.precio).toFixed(2);
        console.log('Renderizando producto:', producto.nombre, 'ID:', producto.id);
        html += `
            <div class="product-card-small">
                <img src="../${producto.imagen_principal}" alt="${producto.nombre}" onerror="this.src='../img/placeholder.jpg'">
                <h4>${producto.nombre}</h4>
                <p class="price">$${precioFormato}</p>
                <a href="producto.php?id=${producto.id}" class="btn btn-small">Ver Detalles</a>
            </div>
        `;
    });
    
    console.log('HTML generado:', html);
    container.innerHTML = html;
    console.log('HTML insertado en el DOM');
}

// Agregar al carrito
function agregarAlCarrito(producto) {
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    const productoEnCarrito = carrito.find(p => p.id == producto.id);
    
    if (productoEnCarrito) {
        productoEnCarrito.cantidad += 1;
    } else {
        carrito.push({
            id: producto.id,
            nombre: producto.nombre,
            precio: producto.precio,
            imagen_principal: producto.imagen_principal,
            cantidad: 1
        });
    }
    
    localStorage.setItem('carrito', JSON.stringify(carrito));
    actualizarContadorCarrito();
    alert(`✅ ${producto.nombre} agregado al carrito`);
    window.location.href = 'carrito.php';
}

// Inicializar cuando el DOM esté listo
console.log('Script producto_detalle.js cargado');

// Intentar ejecutar inmediatamente si el DOM ya está listo
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        console.log('DOMContentLoaded disparado');
        cargarDetallesProducto();
    });
} else {
    console.log('DOM ya está listo, ejecutando cargarDetallesProducto()');
    cargarDetallesProducto();
}
