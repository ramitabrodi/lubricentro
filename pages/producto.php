<<<<<<< HEAD
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
  <title>Detalle del Producto - Lubricentro R/18</title>
  <link rel="stylesheet" href="../css/styles.css">
  
  <style>
    .product-gallery {
      margin-bottom: 1rem;
    }
    
    .product-gallery img {
      width: 100%;
      border-radius: 8px;
    }
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
        <li><a href="../index.php" class="nav-link">Inicio</a></li>
        <li><a href="listado_tabla.php" class="nav-link">Productos</a></li>
        <li><a href="listado_box.php" class="nav-link">Catálogo</a></li>
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
      <a href="../index.php">Inicio</a> → 
      <a href="listado_box.php">Productos</a> → 
      <span id="breadcrumb-nombre">Cargando...</span>
    </div>
  </div>
</section>

<!-- DETALLE DEL PRODUCTO -->
<main class="product-detail-page">
  <div class="container">
    <div class="product-detail-grid">
      
      <!-- Galería de imágenes -->
      <div class="product-image-section">
        <div class="product-gallery" id="product-gallery">
          <p>Cargando imagen...</p>
        </div>
      </div>

      <!-- Información del producto -->
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
          <a href="comprar.php" class="btn btn-outline-dark btn-large">
            Comprar Ahora
          </a>
        </div>

        <div class="product-benefits">
          <div class="benefit-badge">
            <span>🚚</span> Envío gratis
          </div>
          <div class="benefit-badge">
            <span>✓</span> Producto original
          </div>
          <div class="benefit-badge">
            <span>↩️</span> Devolución gratis
          </div>
        </div>
      </div>
    </div>

    <!-- Especificaciones técnicas -->
    <div class="product-specs">
      <h2 class="specs-title">📋 Especificaciones Técnicas</h2>
      <div class="specs-grid">
        <ul id="detalles-lista" class="specs-list"></ul>
      </div>
    </div>

    <!-- Productos relacionados -->
    <div class="related-products">
      <h2 class="section-title">Productos Relacionados</h2>
      <p class="section-subtitle">También te puede interesar</p>
      
      <div class="products-grid-small" id="productos-relacionados">
        <p>Cargando productos relacionados...</p>
      </div>
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

<script src="../JS/producto_detalle.js"></script>

</body>
</html>
=======
<?php
// producto.php - Página de detalles del producto
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto - Lubricentro</title>
    
    <!-- CSS CORREGIDO -->
    <link rel="stylesheet" href="../css/styles.css" />
    <style>
        .producto-detalle {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .producto-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }
        .producto-galeria img {
            width: 100%;
            border-radius: 8px;
        }
        .producto-info h1 {
            margin-bottom: 10px;
        }
        .precio {
            font-size: 2em;
            color: #e74c3c;
            font-weight: bold;
            margin: 20px 0;
        }
        .btn-agregar {
            background: #3498db;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
            width: 100%;
        }
        .btn-agregar:hover {
            background: #2980b9;
        }
        .productos-relacionados {
            margin-top: 60px;
        }
        .relacionados-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 20px;
        }
        .product-card-small {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
        }
        .product-card-small img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }
        .breadcrumb {
            margin-bottom: 20px;
            font-size: 14px;
        }
        .breadcrumb a {
            color: #3498db;
            text-decoration: none;
        }
        .especificaciones {
            margin: 20px 0;
        }
        .especificaciones ul {
            list-style: none;
            padding: 0;
        }
        .especificaciones li {
            padding: 5px 0;
            border-bottom: 1px solid #eee;
        }
    </style>
</head>
<body>
    <!-- HEADER SIMPLIFICADO -->
    <header style="background: #2c3e50; color: white; padding: 15px 0;">
        <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding: 0 20px;">
            <h1 style="margin: 0;">Lubricentro</h1>
            <nav>
                <a href="../index.php" style="color: white; text-decoration: none; margin-left: 15px;">Inicio</a>
                <a href="catalogo.php" style="color: white; text-decoration: none; margin-left: 15px;">Catálogo</a>
                <a href="carrito.php" style="color: white; text-decoration: none; margin-left: 15px;">Carrito (<span id="cart-count">0</span>)</a>
            </nav>
        </div>
    </header>

    <div class="producto-detalle">
        <!-- Migas de pan CORREGIDAS -->
        <nav class="breadcrumb">
            <a href="../index.php">Inicio</a> > 
            <a href="catalogo.php">Catálogo</a> > 
            <span id="breadcrumb-nombre">Producto</span>
        </nav>

        <div class="producto-grid">
            <!-- Galería de imágenes -->
            <div class="producto-galeria" id="product-gallery">
                <p>Cargando imagen...</p>
            </div>

            <!-- Información del producto -->
            <div class="producto-info">
                <p id="codigo-producto">Código: Cargando...</p>
                <h1 id="nombre-producto">Cargando producto...</h1>
                <div class="precio" id="precio-producto">$0.00</div>
                <p id="descripcion-producto">Cargando descripción...</p>
                
                <!-- Especificaciones técnicas -->
                <div class="especificaciones">
                    <h3>Especificaciones Técnicas</h3>
                    <ul id="detalles-lista">
                        <li>Cargando detalles...</li>
                    </ul>
                </div>

                <!-- Botón agregar al carrito -->
                <button id="btn-agregar" class="btn-agregar">Agregar al Carrito</button>
            </div>
        </div>

        <!-- Productos relacionados -->
        <div class="productos-relacionados">
            <h2>Productos Relacionados</h2>
            <div id="productos-relacionados" class="relacionados-grid">
                <p>Cargando productos relacionados...</p>
            </div>
        </div>
    </div>

    <!-- FOOTER SIMPLIFICADO -->
    <footer style="background: #34495e; color: white; text-align: center; padding: 20px; margin-top: 40px;">
        <p>Lubricentro &copy; 2024 - Todos los derechos reservados</p>
    </footer>

    <!-- RUTA CORREGIDA DEL JAVASCRIPT -->
    <script src="../JS/producto_detalle.js"></script>
</body>
</html>
>>>>>>> b114ffd41ff0aacf59517d6d4649fd7f6c6b3ac3
