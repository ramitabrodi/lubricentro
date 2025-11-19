<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
  <title>Productos - Lubricentro R/18</title>
  <link rel="stylesheet" href="../css/styles.css" />
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
        <li><a href="listado_box.php" class="nav-link active">Catálogo</a></li>
        <li><a href="comprar.php" class="nav-link">Comprar</a></li>
        <li><a href="carrito.php" class="nav-link cart-link">
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
      <a href="../index.php">Inicio</a> → <span>Catálogo de Productos</span>
    </div>
  </div>
</section>

<!-- PRODUCTOS -->
<main>
  <div class="container">
    <h2 class="section-title">Catálogo de Productos</h2>
    <p class="section-subtitle">Encuentra los mejores productos para tu vehículo</p>

    <div id="catalogo-dinamico">
      <p style="text-align: center; padding: 40px; color: #999;">Cargando catálogo...</p>
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
<script src="../JS/catalogo.js"></script>
</body>
</html>