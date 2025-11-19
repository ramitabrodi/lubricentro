// Obtener productos desde API
async function cargarProductosCatalogo() {
    try {
        console.log('🔄 Iniciando carga de productos desde catálogo...');
        
        const response = await fetch('../api/productos.php?action=listar');
        
        if (!response.ok) {
            throw new Error(`Error HTTP: ${response.status}`);
        }
        
        const data = await response.json();
        console.log('📦 Datos recibidos:', data);
        
        if (data.success && data.data) {
            mostrarProductosEnCatalogo(data.data);
        } else {
            throw new Error(data.message || 'Error en la respuesta de la API');
        }
        
    } catch (error) {
        console.error('❌ Error cargando productos:', error);
        mostrarErrorEnCatalogo(error.message);
    }
}

// Mostrar productos en el catálogo
function mostrarProductosEnCatalogo(productos) {
    const container = document.getElementById('catalogo-dinamico');
    
    if (!productos || productos.length === 0) {
        container.innerHTML = `
            <div class="empty-state">
                <p>😔 No hay productos disponibles en este momento</p>
                <a href="comprar.php" class="btn btn-primary">Realizar pedido especial</a>
            </div>
        `;
        return;
    }
    
    let html = '<div class="products-grid">';
    
    productos.forEach((producto) => {
        const badge = producto.destacado == 1 ? '<div class="product-badge">Destacado</div>' : '';
        const premium = producto.premium == 1 ? '<div class="product-badge premium">Premium</div>' : '';
        
        // Manejar imagen - corregir ruta
        const imagenSrc = producto.imagen_principal && producto.imagen_principal !== '' 
            ? `../${producto.imagen_principal}`
            : '../img/placeholder-producto.jpg';
        
        // Formatear precio
        const precioFormateado = parseFloat(producto.precio).toLocaleString('es-AR');
        
        html += `
            <div class="product-card">
                ${badge}${premium}
                <img src="${imagenSrc}" alt="${producto.nombre}" 
                     onerror="this.src='../img/placeholder-producto.jpg'">
                <div class="product-info">
                    <h4>${producto.nombre}</h4>
                    <p class="product-brand">${producto.marca} - ${producto.viscosidad || 'N/A'}</p>
                    <div class="product-footer">
                        <span class="product-price">$${precioFormateado}</span>
                        <button onclick="agregarAlCarrito({
                            id: '${producto.id}', 
                            nombre: '${producto.nombre}', 
                            precio: ${producto.precio}
                        })" class="btn-add-cart" title="Agregar al carrito">
                            <span>+</span>
                        </button>
                    </div>
                    <a href="producto.php?id=${producto.id}" class="btn-view-details">Ver Detalles</a>
                </div>
            </div>
        `;
    });
    
    html += '</div>';
    container.innerHTML = html;
    
    console.log(`✅ ${productos.length} productos cargados correctamente`);
}

// Mostrar error en el catálogo
function mostrarErrorEnCatalogo(mensaje) {
    const container = document.getElementById('catalogo-dinamico');
    container.innerHTML = `
        <div class="error-state">
            <p>⚠️ Error al cargar productos</p>
            <p class="error-detail">${mensaje}</p>
            <button onclick="cargarProductosCatalogo()" class="btn btn-primary">Reintentar</button>
            <a href="comprar.php" class="btn btn-outline">Comprar directamente</a>
        </div>
    `;
}

// Cargar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    console.log('🚀 DOM cargado, iniciando catálogo...');
    cargarProductosCatalogo();
});

// También intentar cargar si el DOM ya está listo
if (document.readyState === 'interactive' || document.readyState === 'complete') {
    console.log('⚡ DOM ya listo, cargando catálogo...');
    cargarProductosCatalogo();
}