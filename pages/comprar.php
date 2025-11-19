<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
  <title>Comprar - Lubricentro R/18</title>
  <link rel="stylesheet" href="../css/styles.css">
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
        <li><a href="../index.php" class="nav-link">Inicio</a></li>
        <li><a href="listado_box.php" class="nav-link">Catálogo</a></li>
        <li><a href="comprar.php" class="nav-link active">Comprar</a></li>
        <li><a href="carrito.php" class="nav-link cart-link">
          <span class="cart-icon">🛒</span>
          <span class="cart-badge" id="cart-count">0</span>
        </a></li>
      </ul>
    </nav>
  </div>
</header>

<!-- BREADCRUMB - ELIMINADO -->

<!-- HERO SECTION DEL FORMULARIO -->
<section class="checkout-hero">
  <div class="checkout-hero-content">
    <h2 class="checkout-title">Finalizar Compra</h2>
    <p class="checkout-subtitle">Completa tus datos para procesar el pedido</p>
  </div>
</section>

<!-- FORMULARIO -->
<main class="form-page">
  <div class="container">
    
    <!-- Información del carrito -->
    <div id="info-carrito" class="info-carrito-modern">
      <!-- Se llena con JavaScript -->
    </div>

    <!-- Barra de progreso -->
    <div class="progress-bar-modern">
      <div class="progress-bar-fill" id="progress-bar-fill"></div>
    </div>
    <p class="progress-text">Completa el formulario</p>

    <form id="purchaseForm" class="form-modern" novalidate>
      
      <div class="form-section">
        <h3 class="form-section-title">📋 Información Personal</h3>
        
        <div class="form-group">
          <label for="nombre">Nombre completo *</label>
          <input type="text" id="nombre" name="nombre" placeholder="Ej: Juan Pérez" required>
          <div id="error-nombre" class="error">⚠ Solo se permiten letras y espacios.</div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="telefono">Teléfono *</label>
            <input type="tel" id="telefono" name="telefono" placeholder="Ej: 1156784321" required>
            <div id="error-telefono" class="error">⚠ Solo números (7-15 dígitos).</div>
          </div>

          <div class="form-group">
            <label for="email">Correo electrónico *</label>
            <input type="email" id="email" name="email" placeholder="Ej: usuario@gmail.com" required>
            <div id="error-email" class="error">⚠ Ingrese un correo válido.</div>
          </div>
        </div>

        <div class="form-group">
          <label for="direccion">Dirección *</label>
          <input type="text" id="direccion" name="direccion" placeholder="Ej: Av. Siempre Viva 742" required>
        </div>
      </div>

      <div class="form-section">
        <h3 class="form-section-title">📦 Detalles del Pedido</h3>
        
        <div class="form-row">
          <div class="form-group">
            <label for="producto">Producto *</label>
            <select id="producto" name="producto" required>
              <option value="">Seleccione un producto...</option>
              <option value="Aceite Motor Mineral">Aceite Motor Mineral</option>
              <option value="Aceite Motor Sintético">Aceite Motor Sintético</option>
              <option value="Filtro de Aceite">Filtro de Aceite</option>
              <option value="Filtro de Aire">Filtro de Aire</option>
              <option value="Filtro de Combustible">Filtro de Combustible</option>
            </select>
          </div>

          <div class="form-group">
            <label for="cantidad">Cantidad *</label>
            <input type="number" id="cantidad" name="cantidad" min="1" max="10" value="1">
          </div>
        </div>
      </div>

      <div class="form-section">
        <h3 class="form-section-title">💳 Método de Pago</h3>
        
        <div class="payment-options">
          <label class="payment-option">
            <input type="radio" name="metodoPago" value="Tarjeta de crédito/débito" required>
            <div class="payment-card">
              <span class="payment-icon">💳</span>
              <div class="payment-info">
                <strong>Tarjeta de crédito/débito</strong>
                <small>Visa, Mastercard, American Express</small>
              </div>
            </div>
          </label>

          <label class="payment-option">
            <input type="radio" name="metodoPago" value="Transferencia bancaria">
            <div class="payment-card">
              <span class="payment-icon">🏦</span>
              <div class="payment-info">
                <strong>Transferencia bancaria</strong>
                <small>CBU/CVU - Acreditación inmediata</small>
              </div>
            </div>
          </label>

          <label class="payment-option">
            <input type="radio" name="metodoPago" value="Efectivo">
            <div class="payment-card">
              <span class="payment-icon">💵</span>
              <div class="payment-info">
                <strong>Efectivo</strong>
                <small>Pago en tienda o contra entrega</small>
              </div>
            </div>
          </label>
        </div>

        <div id="error-metodo" class="error">⚠ Seleccione un método de pago.</div>
      </div>

      <button type="submit" class="btn btn-primary btn-large btn-block">
        Confirmar Pedido →
      </button>
    </form>

    <div class="back-link">
      <a href="carrito.php" class="link-back">← Volver al Carrito</a>
    </div>
  </div>
</main>

<!-- FOOTER -->
<footer>
  <div class="container">
    <div class="footer-content">
      <div class="footer-section">
        <h3>🔧 Lubricentro R/18</h3>
        <p>Tu aliado en el mantenimiento automotriz desde 2010</p>
      </div>
      
      <div class="footer-section">
        <h4>Enlaces Rápidos</h4>
        <ul class="footer-links">
          <li><a href="../index.php">Inicio</a></li>
          <li><a href="listado_box.php">Productos</a></li>
          <li><a href="comprar.php">Comprar</a></li>
        </ul>
      </div>
      
      <div class="footer-section">
        <h4>Contacto</h4>
        <ul class="footer-links">
          <li>Tel: (011) 4567-8900</li>
          <li>info@lubricentror18.com</li>
          <li>Av. Principal 123, Ciudad</li>
        </ul>
      </div>
    </div>
    
    <div class="footer-bottom">
      <p>&copy; 2025 Lubricentro R/18. Todos los derechos reservados.</p>
    </div>
  </div>
</footer>

<script src="../JS/app.js"></script>
<script>
// Validar nombre
function validarNombre(nombre) {
    return /^[a-záéíóúñ\s]+$/i.test(nombre.trim());
}

// Validar teléfono
function validarTelefono(telefono) {
    return /^\d{7,15}$/.test(telefono.replace(/\D/g, ''));
}

// Validar email
function validarEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.trim());
}

// Actualizar barra de progreso
function actualizarBarraProgreso() {
    const form = document.getElementById('purchaseForm');
    const inputs = form.querySelectorAll('input[required], select[required]');
    let completados = 0;
    
    inputs.forEach(input => {
        if (input.value.trim() !== '') {
            completados++;
        }
    });
    
    const porcentaje = (completados / inputs.length) * 100;
    const progressBar = document.getElementById('progress-bar-fill');
    if (progressBar) {
        progressBar.style.width = porcentaje + '%';
    }
}

// Cargar información del carrito
function cargarInfoCarrito() {
    const carritoParaCompra = sessionStorage.getItem('carritoParaCompra');
    const productoParaComprar = sessionStorage.getItem('productoParaComprar');
    
    if (carritoParaCompra) {
        const productos = JSON.parse(carritoParaCompra);
        const infoCarrito = document.getElementById('info-carrito');
        
        let html = '<div class="cart-summary"><h4>📦 Productos en tu pedido:</h4><ul>';
        let total = 0;
        
        productos.forEach(item => {
            const precio = typeof item.precio === 'string' 
                ? parseFloat(item.precio.replace(/[^\d]/g, '')) || 0
                : item.precio || 0;
            const subtotal = precio * (item.cantidad || 1);
            total += subtotal;
            
            html += `<li>${item.nombre} x${item.cantidad || 1} - $${subtotal.toFixed(2)}</li>`;
        });
        
        html += `</ul><p class="total-price"><strong>Total: $${total.toFixed(2)}</strong></p></div>`;
        infoCarrito.innerHTML = html;
        
        // Bloquear cambios de cantidad
        const inputCantidad = document.getElementById('cantidad');
        if (inputCantidad) {
            inputCantidad.value = '1';
            inputCantidad.setAttribute('readonly', 'readonly');
            inputCantidad.setAttribute('title', 'Cantidad desde carrito');
        }
    } else if (productoParaComprar) {
        // Si viene desde "Comprar Ahora" en página de detalles
        const producto = JSON.parse(productoParaComprar);
        const infoCarrito = document.getElementById('info-carrito');
        const precioNumerico = typeof producto.precio === 'string' 
            ? parseFloat(producto.precio.replace(/[^\d]/g, '')) || 0
            : producto.precio || 0;
        
        const html = `<div class="cart-summary"><h4>📦 Producto a comprar:</h4><ul>
            <li>${producto.nombre} x1 - $${precioNumerico.toFixed(2)}</li>
            </ul><p class="total-price"><strong>Total: $${precioNumerico.toFixed(2)}</strong></p></div>`;
        infoCarrito.innerHTML = html;
        
        // Bloquear el selector de producto
        const selectProducto = document.getElementById('producto');
        if (selectProducto) {
            selectProducto.value = producto.nombre;
            selectProducto.setAttribute('readonly', 'readonly');
            selectProducto.style.pointerEvents = 'none';
        }
        
        // Bloquear cantidad
        const inputCantidad = document.getElementById('cantidad');
        if (inputCantidad) {
            inputCantidad.value = '1';
            inputCantidad.setAttribute('readonly', 'readonly');
            inputCantidad.setAttribute('title', 'Cantidad: 1');
        }
    } else {
        const infoCarrito = document.getElementById('info-carrito');
        if (infoCarrito) {
            infoCarrito.style.display = 'none';
        }
    }
}

// Validar formulario en tiempo real
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('purchaseForm');
    
    // Cargar información del carrito al iniciar
    cargarInfoCarrito();
    
    if (form) {
        // Escuchar cambios en inputs para actualizar progreso
        form.querySelectorAll('input, select').forEach(input => {
            input.addEventListener('change', actualizarBarraProgreso);
            input.addEventListener('keyup', actualizarBarraProgreso);
        });
        
        // Validar nombre
        const nombreInput = document.getElementById('nombre');
        if (nombreInput) {
            nombreInput.addEventListener('blur', () => {
                const errorNombre = document.getElementById('error-nombre');
                if (nombreInput.value && !validarNombre(nombreInput.value)) {
                    if (errorNombre) errorNombre.style.display = 'block';
                } else if (errorNombre) {
                    errorNombre.style.display = 'none';
                }
            });
        }
        
        // Validar teléfono
        const telInput = document.getElementById('telefono');
        if (telInput) {
            telInput.addEventListener('blur', () => {
                const errorTel = document.getElementById('error-telefono');
                if (telInput.value && !validarTelefono(telInput.value)) {
                    if (errorTel) errorTel.style.display = 'block';
                } else if (errorTel) {
                    errorTel.style.display = 'none';
                }
            });
        }
        
        // Validar email
        const emailInput = document.getElementById('email');
        if (emailInput) {
            emailInput.addEventListener('blur', () => {
                const errorEmail = document.getElementById('error-email');
                if (emailInput.value && !validarEmail(emailInput.value)) {
                    if (errorEmail) errorEmail.style.display = 'block';
                } else if (errorEmail) {
                    errorEmail.style.display = 'none';
                }
            });
        }
        
        // Procesar envío del formulario
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Validar campos requeridos
            const campos = form.querySelectorAll('input[required], select[required]');
            let valido = true;
            
            campos.forEach(campo => {
                if (!campo.value.trim()) {
                    valido = false;
                }
            });
            
            if (!valido) {
                alert('Por favor completa todos los campos requeridos');
                return;
            }
            
            // Validar nombre, teléfono, email
            const nombre = document.getElementById('nombre').value;
            const telefono = document.getElementById('telefono').value;
            const email = document.getElementById('email').value;
            
            if (!validarNombre(nombre)) {
                alert('Nombre inválido');
                return;
            }
            if (!validarTelefono(telefono)) {
                alert('Teléfono inválido');
                return;
            }
            if (!validarEmail(email)) {
                alert('Email inválido');
                return;
            }
            
            // Guardar datos de la compra
            const datosCompra = {
                nombre: nombre,
                telefono: telefono,
                email: email,
                direccion: document.getElementById('direccion').value,
                producto: document.getElementById('producto').value,
                cantidad: document.getElementById('cantidad').value,
                metodoPago: document.querySelector('input[name="metodoPago"]:checked') ? 
                    document.querySelector('input[name="metodoPago"]:checked').value : '',
                fecha: new Date().toLocaleDateString('es-AR'),
                hora: new Date().toLocaleTimeString('es-AR')
            };
            
            // Guardar compra en localStorage
            let compras = JSON.parse(localStorage.getItem('compras')) || [];
            compras.push(datosCompra);
            localStorage.setItem('compras', JSON.stringify(compras));
            
            // LIMPIAR CARRITO
            localStorage.removeItem('carrito');
            localStorage.removeItem('carritoParaCompra');
            sessionStorage.removeItem('carritoParaCompra');
            sessionStorage.removeItem('productoParaComprar');
            
            // ACTUALIZAR CONTADOR GLOBALMENTE
            carrito = [];
            actualizarContadorCarrito();
            
            // Mostrar mensaje de éxito
            alert('✅ ¡Compra realizada exitosamente!\n\nNúmero de orden: #' + (Math.random() * 100000).toFixed(0));
            
            // Limpiar formulario
            form.reset();
            
            // Scroll al inicio
            window.scrollTo(0, 0);
        });
    }
});
</script>
</body>
</html>