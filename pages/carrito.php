<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/x-icon" href="../img/favicon.ico">
<title>Carrito - Lubricentro R/18</title>
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
        <li><a href="comprar.php" class="nav-link">Comprar</a></li>
        <li><a href="carrito.php" class="nav-link cart-link active">
          <span class="cart-icon">🛒</span>
          <span class="cart-badge" id="cart-count">0</span>
        </a></li>
      </ul>
    </nav>
  </div>
</header>

<!-- BREADCRUMB -->
<section class="breadcrumb-section">
  <div class="container">
    <div class="breadcrumb">
      <a href="../index.php">Inicio</a> → <span>Carrito de Compras</span>
    </div>
  </div>
</section>

<!-- CARRITO -->
<main class="cart-page">
  <div class="container">
    <h2 class="section-title">🛒 Tu Carrito</h2>
    <p class="section-subtitle">Revisa tus productos antes de finalizar la compra</p>

    <div class="cart-content">
      <div class="cart-items-section">
        <div id="cart-container" class="cart-container-modern">
          <div class="empty-cart">
            <div class="empty-cart-icon">🛒</div>
            <h3>Tu carrito está vacío</h3>
            <p>Agrega productos para comenzar tu compra</p>
            <a href="listado_box.php" class="btn btn-primary">Ver Productos</a>
          </div>
        </div>
      </div>

      <div class="cart-summary">
        <div class="summary-card">
          <h3>Resumen de Compra</h3>
          <div class="summary-line">
            <span>Subtotal:</span>
            <span id="cart-subtotal">$0</span>
          </div>
          <div class="summary-line">
            <span>Envío:</span>
            <span class="free-shipping">Gratis</span>
          </div>
          <div class="summary-divider"></div>
          <div class="summary-total">
            <span>Total:</span>
            <span id="cart-total">$0</span>
          </div>
          
          <div class="cart-actions-summary" id="cart-actions">
            <a href="comprar.php" class="btn btn-primary btn-block" id="finalizar-compra">
              Finalizar Compra
            </a>
            <button id="clear-cart" class="btn btn-outline-danger btn-block">
              Vaciar Carrito
            </button>
          </div>
        </div>

        <div class="security-badges">
          <div class="badge-item">
            <span>🔒</span>
            <small>Compra Segura</small>
          </div>
          <div class="badge-item">
            <span>🚚</span>
            <small>Envío Gratis</small>
          </div>
          <div class="badge-item">
            <span>↩️</span>
            <small>Devoluciones</small>
          </div>
        </div>
      </div>
    </div>

    <div class="continue-shopping">
      <a href="listado_box.php" class="link-continue">← Continuar Comprando</a>
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
</body>
</html>