// Obtener productos desde API
async function cargarProductosCatalogo() {
    try {
        const response = await fetch('../api/productos.php?action=listar');
        const data = await response.json();
        
        if (data.success && data.data) {
            mostrarProductosEnCatalogo(data.data);
        }
    } catch (error) {
        console.error('Error cargando productos:', error);
        document.getElementById('catalogo-dinamico').innerHTML = '<p>Error al cargar productos</p>';
    }
}

// Mostrar productos en el catálogo
function mostrarProductosEnCatalogo(productos) {
    const container = document.getElementById('catalogo-dinamico');
    
    if (!productos || productos.length === 0) {
        container.innerHTML = '<p>No hay productos disponibles</p>';
        return;
    }
    
    let html = '<div class="products-grid">';
    
    productos.forEach((producto, index) => {
        const badge = producto.destacado === '1' ? '<div class="product-badge">Destacado</div>' : '';
        const premium = producto.premium === '1' ? '<div class="product-badge premium">Premium</div>' : '';
        
        html += `
            <div class="product-card">
                ${badge}${premium}
                <img src="../${producto.imagen_principal}" alt="${producto.nombre}">
                <div class="product-info">
                    <h4>${producto.nombre}</h4>
                    <p class="product-brand">${producto.marca} - ${producto.viscosidad}</p>
                    <div class="product-footer">
                        <span class="product-price">$${parseFloat(producto.precio).toLocaleString('es-AR')}</span>
                        <button onclick="agregarAlCarrito({id:'${producto.id}', nombre:'${producto.nombre}', precio:${producto.precio}})" class="btn-add-cart" title="Agregar al carrito">
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
}

// Cargar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    cargarProductosCatalogo();
});
