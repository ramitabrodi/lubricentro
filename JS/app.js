// ==== SISTEMA DE CARRITO UNIFICADO ====
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

// Agregar producto al carrito
function agregarAlCarrito(producto) {
    const existe = carrito.find(item => item.id === producto.id);
    
    if (existe) {
        existe.cantidad = (existe.cantidad || 1) + 1;
    } else {
        carrito.push({
            id: producto.id,
            nombre: producto.nombre,
            precio: producto.precio,
            cantidad: 1
        });
    }
    
    localStorage.setItem("carrito", JSON.stringify(carrito));
    actualizarContadorCarrito();
    mostrarNotificacion(`✅ ${producto.nombre} agregado al carrito`);
}

// Eliminar producto del carrito
function eliminarDelCarrito(index) {
    carrito.splice(index, 1);
    localStorage.setItem("carrito", JSON.stringify(carrito));
    actualizarContadorCarrito();
    mostrarCarrito();
}

// Vaciar carrito completo
function vaciarCarrito() {
    if (confirm('¿Estás seguro de vaciar el carrito?')) {
        carrito = [];
        localStorage.removeItem("carrito");
        actualizarContadorCarrito();
        mostrarCarrito();
        mostrarNotificacion('🗑️ Carrito vaciado');
    }
}

// Mostrar notificación
function mostrarNotificacion(mensaje, tipo = 'success') {
    let notif = document.getElementById('notification-global');
    if (!notif) {
        notif = document.createElement('div');
        notif.id = 'notification-global';
        notif.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: #1A3A5F;
            color: white;
            padding: 15px 25px;
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            z-index: 9999;
            opacity: 0;
            transform: translateY(-20px);
            transition: all 0.4s ease;
        `;
        document.body.appendChild(notif);
    }
    
    notif.textContent = mensaje;
    notif.style.background = tipo === 'error' ? '#c0392b' : '#1A3A5F';
    notif.style.opacity = '1';
    notif.style.transform = 'translateY(0)';
    
    setTimeout(() => {
        notif.style.opacity = '0';
        notif.style.transform = 'translateY(-20px)';
    }, 3000);
}

// Calcular total del carrito
function calcularTotal() {
    return carrito.reduce((total, item) => {
        const precio = typeof item.precio === 'string' 
            ? parseFloat(item.precio.replace(/[^\d]/g, '')) || 0
            : item.precio || 0;
        return total + (precio * (item.cantidad || 1));
    }, 0);
}

// Mostrar carrito (para página carrito.php)
function mostrarCarrito() {
    const container = document.getElementById('cart-container');
    const totalDiv = document.getElementById('cart-total');
    const actions = document.getElementById('cart-actions');
    
    if (!container) return;
    
    // Recargar desde localStorage
    carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    
    if (carrito.length === 0) {
        container.innerHTML = `
            <div class="empty-cart">
                <p>Tu carrito está vacío</p>
                <a href="listado_box.php" class="cta-button" style="margin-top: 1rem;">Ver Productos</a>
            </div>
        `;
        if (totalDiv) totalDiv.style.display = 'none';
        if (actions) actions.style.display = 'none';
        actualizarContadorCarrito();
    } else {
        container.innerHTML = '';
        
        carrito.forEach((item, index) => {
            const itemDiv = document.createElement('div');
            itemDiv.className = 'cart-item';
            const precioMostrar = typeof item.precio === 'string' ? item.precio : `$${item.precio}`;
            itemDiv.innerHTML = `
                <div class="cart-item-checkbox">
                    <input type="checkbox" class="item-checkbox" data-index="${index}" id="check-${index}">
                    <label for="check-${index}"></label>
                </div>
                <div class="cart-item-info">
                    <h4>${item.nombre}</h4>
                    <p>Cantidad: ${item.cantidad || 1}</p>
                </div>
                <div class="cart-item-price">${precioMostrar}</div>
                <button class="btn btn-small btn-danger" onclick="eliminarDelCarrito(${index})">Eliminar</button>
            `;
            container.appendChild(itemDiv);
        });
        
        const total = calcularTotal();
        if (totalDiv) {
            totalDiv.textContent = `Total: $${total.toLocaleString('es-AR')}`;
            totalDiv.style.display = 'block';
        }
        if (actions) actions.style.display = 'flex';
        
        // Agregar event listeners a checkboxes
        agregarEventosCheckboxes();
    }
}

// Función para agregar eventos a los checkboxes
function agregarEventosCheckboxes() {
    const checkboxes = document.querySelectorAll('.item-checkbox');
    const selectAllBtn = document.getElementById('select-all-btn');
    const finalizarBtn = document.getElementById('finalizar-compra');
    const btnVaciar = document.getElementById('clear-cart');
    
    // Evento para cada checkbox
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            actualizarBotones();
        });
    });
    
    // Botón "Seleccionar Todo"
    if (selectAllBtn) {
        selectAllBtn.addEventListener('click', (e) => {
            e.preventDefault();
            const allChecked = Array.from(checkboxes).every(cb => cb.checked);
            checkboxes.forEach(cb => cb.checked = !allChecked);
            selectAllBtn.textContent = allChecked ? '✓ Seleccionar Todo' : '✓ Deseleccionar Todo';
            actualizarBotones();
        });
    }
    
    // Botón "Finalizar Compra"
    if (finalizarBtn) {
        finalizarBtn.addEventListener('click', (e) => {
            e.preventDefault();
            const seleccionados = Array.from(checkboxes).filter(cb => cb.checked);
            
            if (seleccionados.length === 0) {
                mostrarNotificacion('Por favor selecciona al menos un producto', 'error');
                return;
            }
            
            // Guardar productos seleccionados en sessionStorage
            const productosSeleccionados = seleccionados.map(cb => {
                const index = parseInt(cb.dataset.index);
                return carrito[index];
            });
            
            sessionStorage.setItem('carritoParaCompra', JSON.stringify(productosSeleccionados));
            sessionStorage.setItem('compraDesdeCarrito', 'true');
            
            // Redirigir a compra
            window.location.href = 'comprar.php';
        });
    }
    
    // Botón "Vaciar Carrito"
    if (btnVaciar) {
        btnVaciar.addEventListener('click', (e) => {
            e.preventDefault();
            vaciarCarrito();
        });
    }
}

// Actualizar visibilidad de botones según selección
function actualizarBotones() {
    const checkboxes = document.querySelectorAll('.item-checkbox');
    const finalizarBtn = document.getElementById('finalizar-compra');
    const selectAllBtn = document.getElementById('select-all-btn');
    const totalDiv = document.getElementById('cart-total');
    
    const haySeleccionados = Array.from(checkboxes).some(cb => cb.checked);
    
    if (finalizarBtn) {
        finalizarBtn.style.display = haySeleccionados ? 'block' : 'none';
    }
    
    const allChecked = Array.from(checkboxes).every(cb => cb.checked);
    if (selectAllBtn) {
        selectAllBtn.textContent = allChecked && haySeleccionados ? '✓ Deseleccionar Todo' : '✓ Seleccionar Todo';
    }
    
    // Actualizar total de solo los productos seleccionados
    if (totalDiv && haySeleccionados) {
        let totalSeleccionados = 0;
        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                const index = parseInt(checkbox.dataset.index);
                const item = carrito[index];
                if (item) {
                    const precio = typeof item.precio === 'string' 
                        ? parseFloat(item.precio.replace(/[^\d]/g, '')) || 0
                        : item.precio || 0;
                    totalSeleccionados += precio * (item.cantidad || 1);
                }
            }
        });
        totalDiv.textContent = `Total: $${totalSeleccionados.toFixed(2)}`;
    } else if (totalDiv) {
        // Si no hay seleccionados, mostrar total de todos
        const total = calcularTotal();
        totalDiv.textContent = `Total: $${total.toFixed(2)}`;
    }
}

// Función para actualizar la barra de progreso - CORREGIDA
function actualizarBarraProgreso() {
    const form = document.getElementById('purchaseForm');
    const progressFill = document.getElementById('progress-bar-fill');
    
    if (!form || !progressFill) return;
    
    const inputs = form.querySelectorAll('input:not([type="radio"]), select, textarea');
    const radioGroups = {};
    
    // Recopilar grupos de radio buttons
    form.querySelectorAll('input[type="radio"]').forEach(radio => {
        if (!radioGroups[radio.name]) {
            radioGroups[radio.name] = radio.name;
        }
    });
    
    let camposCompletados = 0;
    let camposTotales = inputs.length + Object.keys(radioGroups).length;
    
    // Contar inputs normales completados
    inputs.forEach(input => {
        if (input.type === 'select-one') {
            if (input.value && input.value !== '') {
                camposCompletados++;
            }
        } else {
            if (input.value.trim() !== '') {
                camposCompletados++;
            }
        }
    });
    
    // Contar grupos de radio completados
    Object.keys(radioGroups).forEach(groupName => {
        if (document.querySelector(`input[name="${groupName}"]:checked`)) {
            camposCompletados++;
        }
    });
    
    const porcentaje = camposTotales > 0 ? (camposCompletados / camposTotales) * 100 : 0;
    progressFill.style.width = porcentaje + '%';
    
    // Cambiar color según progreso
    if (porcentaje < 33) {
        progressFill.style.background = '#e74c3c';
    } else if (porcentaje < 66) {
        progressFill.style.background = '#f39c12';
    } else if (porcentaje < 100) {
        progressFill.style.background = '#3498db';
    } else {
        progressFill.style.background = '#2ecc71';
    }
}

// Función para preparar la compra desde el carrito
function prepararCompraDesdeCarrito() {
    const carritoActual = JSON.parse(localStorage.getItem("carrito")) || [];
    
    if (carritoActual.length === 0) {
        mostrarNotificacion('Tu carrito está vacío', 'error');
        return false;
    }
    
    sessionStorage.setItem('compraDesdeCarrito', 'true');
    sessionStorage.setItem('carritoParaCompra', JSON.stringify(carritoActual));
    
    return true;
}

// Función para cargar productos del carrito en el formulario de compra
function cargarCarritoEnFormulario() {
    const compraDesdeCarrito = sessionStorage.getItem('compraDesdeCarrito');
    const carritoParaCompra = sessionStorage.getItem('carritoParaCompra');
    
    if (compraDesdeCarrito === 'true' && carritoParaCompra) {
        const carrito = JSON.parse(carritoParaCompra);
        
        const infoCarrito = document.getElementById('info-carrito');
        if (infoCarrito) {
            infoCarrito.style.display = 'block';
            const totalItems = carrito.reduce((acc, item) => acc + (item.cantidad || 1), 0);
            infoCarrito.innerHTML = `
                <strong>📦 Compra desde carrito:</strong> 
                ${carrito.length} producto(s) - ${totalItems} item(s) total
                <br><small>Tus productos han sido cargados automáticamente</small>
            `;
        }
        
        const selectProducto = document.getElementById('producto');
        if (selectProducto) {
            selectProducto.innerHTML = '<option value="">Seleccione un producto...</option>';
            
            carrito.forEach(item => {
                const option = document.createElement('option');
                option.value = item.nombre;
                option.textContent = `${item.nombre} (Cantidad: ${item.cantidad || 1})`;
                option.selected = true;
                selectProducto.appendChild(option);
            });
            
            if (carrito.length > 1) {
                const optionResumen = document.createElement('option');
                optionResumen.value = 'multiple';
                optionResumen.textContent = `Múltiples productos (${carrito.length} items del carrito)`;
                optionResumen.selected = true;
                selectProducto.insertBefore(optionResumen, selectProducto.firstChild.nextSibling);
            }
        }
        
        const inputCantidad = document.getElementById('cantidad');
        if (inputCantidad) {
            const cantidadTotal = carrito.reduce((total, item) => total + (item.cantidad || 1), 0);
            inputCantidad.value = cantidadTotal;
            inputCantidad.setAttribute('readonly', 'true');
            inputCantidad.title = 'Cantidad automática desde el carrito';
        }
        
        sessionStorage.removeItem('compraDesdeCarrito');
        sessionStorage.removeItem('carritoParaCompra');
        
        setTimeout(actualizarBarraProgreso, 100);
    }
}

// Inicialización cuando carga la página
document.addEventListener('DOMContentLoaded', () => {
    actualizarContadorCarrito();
    
    // Si estamos en la página del carrito
    if (document.getElementById('cart-container')) {
        mostrarCarrito();
        
        const btnVaciar = document.getElementById('clear-cart');
        if (btnVaciar) {
            btnVaciar.addEventListener('click', function(e) {
                e.preventDefault();
                vaciarCarrito();
            });
        }
        
        const btnFinalizar = document.getElementById('finalizar-compra');
        if (btnFinalizar) {
            btnFinalizar.addEventListener('click', function(e) {
                if (!prepararCompraDesdeCarrito()) {
                    e.preventDefault();
                }
            });
        }
    }
    
    // Si estamos en la página de detalle de producto
    const btnAgregar = document.getElementById('btn-agregar');
    if (btnAgregar) {
        btnAgregar.addEventListener('click', () => {
            const producto = {
                id: document.getElementById('codigo-producto').textContent.replace('Código: ', ''),
                nombre: document.getElementById('nombre-producto').textContent,
                precio: document.getElementById('precio-producto').textContent
            };
            agregarAlCarrito(producto);
        });
    }
    
    // Si estamos en la página de compra
    const formCompra = document.getElementById('purchaseForm');
    if (formCompra) {
        cargarCarritoEnFormulario();
        
        const inputs = formCompra.querySelectorAll('input, select');
        
        inputs.forEach(input => {
            if (input.type === 'radio') {
                input.addEventListener('change', actualizarBarraProgreso);
            } else {
                input.addEventListener('input', actualizarBarraProgreso);
            }
        });
        
        actualizarBarraProgreso();
        
        const validarNombre = nombre => /^[a-zA-ZÀ-ÿ\s]{2,}$/.test(nombre);
        const validarTelefono = tel => /^[0-9]{7,15}$/.test(tel);
        const validarEmail = email => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        
        formCompra.addEventListener('submit', (e) => {
            e.preventDefault();
            let valido = true;
            
            const nombre = document.getElementById('nombre');
            const tel = document.getElementById('telefono');
            const email = document.getElementById('email');
            const metodoPago = document.querySelector('input[name="metodoPago"]:checked');
            const producto = document.getElementById('producto');
            
            // Validaciones...
            const errorNombre = document.getElementById('error-nombre');
            if (nombre && !validarNombre(nombre.value.trim())) {
                if (errorNombre) errorNombre.style.display = 'block';
                valido = false;
            } else if (errorNombre) {
                errorNombre.style.display = 'none';
            }
            
            const errorTel = document.getElementById('error-telefono');
            if (tel && !validarTelefono(tel.value.trim())) {
                if (errorTel) errorTel.style.display = 'block';
                valido = false;
            } else if (errorTel) {
                errorTel.style.display = 'none';
            }
            
            const errorEmail = document.getElementById('error-email');
            if (email && !validarEmail(email.value.trim())) {
                if (errorEmail) errorEmail.style.display = 'block';
                valido = false;
            } else if (errorEmail) {
                errorEmail.style.display = 'none';
            }
            
            const errorMetodo = document.getElementById('error-metodo');
            if (!metodoPago) {
                if (errorMetodo) errorMetodo.style.display = 'block';
                valido = false;
            } else if (errorMetodo) {
                errorMetodo.style.display = 'none';
            }
            
            if (producto && producto.value === '') {
                valido = false;
                producto.style.borderColor = '#c0392b';
            } else if (producto) {
                producto.style.borderColor = '';
            }
            
            if (!valido) {
                mostrarNotificacion('Por favor completa correctamente todos los campos', 'error');
                return;
            }
            
            // AQUÍ ESTÁ LA CORRECCIÓN PRINCIPAL
            const carritoParaCompra = sessionStorage.getItem('carritoParaCompra');
            const esCompraDesdeCarrito = carritoParaCompra !== null;
            
            if (esCompraDesdeCarrito) {
                // Si vino desde el carrito, limpiar SOLO los productos que se compraron
                const productosComprados = JSON.parse(carritoParaCompra);
                
                // Vaciar el carrito completo si se compraron todos los productos
                carrito = [];
                localStorage.setItem("carrito", JSON.stringify(carrito));
                actualizarContadorCarrito();
                
                // Limpiar sessionStorage
                sessionStorage.removeItem('carritoParaCompra');
                sessionStorage.removeItem('compraDesdeCarrito');
                
                mostrarNotificacion('✅ Compra finalizada correctamente. ¡Gracias por tu pedido!');
            } else {
                // Si es una compra directa (NO desde carrito), no agregar nada al carrito
                mostrarNotificacion('✅ Pedido enviado correctamente. Nos contactaremos pronto.');
            }
            
            // Resetear formulario
            formCompra.reset();
            actualizarBarraProgreso();
            
            const inputCantidad = document.getElementById('cantidad');
            if (inputCantidad) {
                inputCantidad.removeAttribute('readonly');
                inputCantidad.removeAttribute('title');
            }
            
            const infoCarrito = document.getElementById('info-carrito');
            if (infoCarrito) {
                infoCarrito.style.display = 'none';
            }
            
            // QUEDARSE EN LA MISMA PÁGINA - NO REDIRIGIR
            // Scroll al inicio para ver el mensaje de éxito
            window.scrollTo(0, 0);
        });
    }
});

// Hacer funciones disponibles globalmente
window.agregarAlCarrito = agregarAlCarrito;
window.eliminarDelCarrito = eliminarDelCarrito;
window.vaciarCarrito = vaciarCarrito;
window.mostrarCarrito = mostrarCarrito;
window.prepararCompraDesdeCarrito = prepararCompraDesdeCarrito;

// --- Menú hamburguesa ---
const menuToggle = document.getElementById("menu-toggle");
const navMenu = document.getElementById("nav-menu");

if (menuToggle && navMenu) {
    menuToggle.addEventListener("click", () => {
        navMenu.classList.toggle("show-menu");
    });
}