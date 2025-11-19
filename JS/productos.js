// Detectar ruta base según de dónde se llama
function obtenerRutaAPI() {
    const current = window.location.pathname;
    if (current.includes('/pages/')) {
        return '../JS/api_productos.php';
    }
    return 'JS/api_productos.php';
}

// Obtener todos los productos
async function obtenerProductos() {
    try {
        const rutaAPI = obtenerRutaAPI();
        const response = await fetch(rutaAPI);
        if (!response.ok) {
            throw new Error('Error al obtener productos: ' + response.status);
        }
        const productos = await response.json();
        return Array.isArray(productos) ? productos : [];
    } catch (error) {
        console.error('Error obteniendo productos:', error);
        return [];
    }
}

// Carrusel de productos
function inicializarCarrusel() {
    const carruselContainer = document.getElementById('carrusel-productos');
    if (!carruselContainer) return;

    obtenerProductos().then(productos => {
        if (productos.length === 0) {
            carruselContainer.innerHTML = '<p>No hay productos disponibles</p>';
            return;
        }

        let indiceActual = 0;
        const totalProductos = productos.length;

        function mostrarProducto(indice) {
            const producto = productos[indice];
            carruselContainer.innerHTML = `
                <div class="carrusel-item">
                    <img src="${producto.imagen}" alt="${producto.nombre}" class="carrusel-imagen">
                    <div class="carrusel-info">
                        <h3>${producto.nombre}</h3>
                        <p class="precio">$${parseFloat(producto.precio).toFixed(2)}</p>
                        <p class="descripcion">${producto.descripcion}</p>
                        <button class="btn-carrusel" onclick="irAProducto(${producto.id})">Ver Más</button>
                    </div>
                    <div class="carrusel-controles">
                        <button class="prev" onclick="cambiarProducto(-1)">❮</button>
                        <span class="carrusel-contador">${indice + 1} / ${totalProductos}</span>
                        <button class="next" onclick="cambiarProducto(1)">❯</button>
                    </div>
                </div>
            `;
        }

        window.cambiarProducto = function (direccion) {
            indiceActual = (indiceActual + direccion + totalProductos) % totalProductos;
            mostrarProducto(indiceActual);
        };

        window.irAProducto = function (id) {
            const rutaProducto = window.location.pathname.includes('/pages/') ? 'producto.html' : 'pages/producto.html';
            window.location.href = `${rutaProducto}?id=${id}`;
        };

        mostrarProducto(indiceActual);

        // Cambio automático cada 5 segundos
        setInterval(() => {
            indiceActual = (indiceActual + 1) % totalProductos;
            mostrarProducto(indiceActual);
        }, 5000);
    });
}

// Lista de productos
function inicializarListaProductos() {
    const listaContainer = document.getElementById('lista-productos');
    if (!listaContainer) return;

    obtenerProductos().then(productos => {
        if (productos.length === 0) {
            listaContainer.innerHTML = '<p>No hay productos disponibles</p>';
            return;
        }

        let html = '<div class="productos-grid">';
        productos.forEach(producto => {
            html += `
                <div class="producto-card">
                    <img src="${producto.imagen}" alt="${producto.nombre}" class="producto-imagen">
                    <div class="producto-info">
                        <h3>${producto.nombre}</h3>
                        <p class="precio">$${parseFloat(producto.precio).toFixed(2)}</p>
                        <p class="descripcion">${producto.descripcion.substring(0, 100)}...</p>
                        <div class="producto-botones">
                            <button class="btn-ver-mas" onclick="irAProducto(${producto.id})">Ver Más</button>
                            <button class="btn-comprar" onclick="agregarAlCarrito(${producto.id})">Comprar</button>
                        </div>
                    </div>
                </div>
            `;
        });
        html += '</div>';
        listaContainer.innerHTML = html;
    });
}

// Agregar al carrito
function agregarAlCarrito(id) {
    obtenerProductos().then(productos => {
        const producto = productos.find(p => p.id === parseInt(id));
        if (producto) {
            let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            const productoEnCarrito = carrito.find(p => p.id === parseInt(id));

            if (productoEnCarrito) {
                productoEnCarrito.cantidad += 1;
            } else {
                producto.cantidad = 1;
                carrito.push(producto);
            }

            localStorage.setItem('carrito', JSON.stringify(carrito));
            alert(`${producto.nombre} agregado al carrito`);
            const rutaCarrito = window.location.pathname.includes('/pages/') ? 'carrito.html' : 'pages/carrito.html';
            window.location.href = rutaCarrito;
        }
    });
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    inicializarCarrusel();
    inicializarListaProductos();
});
