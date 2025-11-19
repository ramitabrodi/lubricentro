<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
  <title>Detalle del Producto - Lubricentro R/18</title>
  <link rel="stylesheet" href="../css/styles.css">
  
  <style>
    .product-detail-page {
      background-color: white;
      padding: 2rem;
    }
    
    .product-detail-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 3rem;
      margin-bottom: 4rem;
      align-items: start;
    }
    
    .product-image-section {
      display: block;
      width: 100%;
      max-width: 400px;
    }
    
    .product-gallery {
      margin: 0;
      padding: 0;
      border: 0;
      width: 100%;
      height: 400px;
    }
    
    .product-gallery img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
      display: block;
    }
    
    .product-info-section {
      padding: 1.5rem;
      background: rgba(255, 255, 255, 0.95);
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }
    
    .product-code {
      color: #2563eb;
      font-size: 0.85rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 0.5rem;
    }
    
    .product-title {
      font-size: 1.75rem;
      color: #1e293b;
      margin-bottom: 0.75rem;
      font-weight: 800;
    }
    
    .product-rating {
      margin-bottom: 1rem;
      font-size: 1rem;
      color: #64748b;
    }
    
    .rating-count {
      color: #64748b;
      font-size: 0.85rem;
      margin-left: 0.5rem;
    }
    
    .product-price-large {
      font-size: 2rem;
      font-weight: 800;
      color: #10b981;
      margin-bottom: 1rem;
    }
    
    .product-description {
      color: #475569;
      font-size: 0.95rem;
      line-height: 1.6;
      margin-bottom: 1.5rem;
    }
    
    .product-actions {
      display: flex;
      gap: 1rem;
      margin-bottom: 1.5rem;
    }
    
    .product-benefits {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 0.75rem;
      padding: 1rem;
      background: #f0f9ff;
      border-left: 4px solid #2563eb;
      border-radius: 8px;
    }
    
    .benefit-badge {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      font-size: 0.8rem;
      color: #1e293b;
    }
    
    .benefit-badge span {
      font-size: 1.25rem;
      margin-bottom: 0.3rem;
    }
    
    .product-specs {
      background: rgba(255, 255, 255, 0.95);
      padding: 2rem;
      border-radius: 12px;
      margin-bottom: 4rem;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }
    
    .specs-title {
      font-size: 1.5rem;
      color: #1e293b;
      margin-bottom: 1.5rem;
    }
    
    .specs-list {
      list-style: none;
      padding: 0;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1rem;
    }
    
    .specs-list li {
      padding: 0.75rem;
      color: #475569;
      border-left: 3px solid #2563eb;
      padding-left: 1rem;
    }
    
    .related-products {
      margin-bottom: 4rem;
      background: linear-gradient(135deg, rgba(30, 60, 114, 0.9) 0%, rgba(42, 82, 152, 0.9) 50%, rgba(37, 99, 235, 0.85) 100%);
      padding: 3rem 2rem;
      border-radius: 16px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    
    .related-products .section-title {
      color: #ffffff;
      font-size: 2rem;
      margin-bottom: 0.5rem;
      text-shadow: 1px 2px 4px rgba(0, 0, 0, 0.3);
    }
    
    .related-products .section-subtitle {
      color: #e0e7ff;
      font-size: 1.1rem;
      margin-bottom: 2.5rem;
      text-shadow: 1px 2px 4px rgba(0, 0, 0, 0.2);
    }
    
    .products-grid-small {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1.5rem;
    }
    
    .related-product-card {
      background: rgba(255, 255, 255, 0.95);
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
      transition: all 0.3s ease;
      display: grid;
      grid-template-columns: 300px 1fr;
      gap: 1.5rem;
      padding: 1.5rem;
      align-items: center;
    }
    
    .related-product-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
    }
    
    .related-product-card img {
      width: 100%;
      height: 280px;
      object-fit: cover;
      border-radius: 10px;
    }
    
    .related-product-info {
      padding: 0;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    
    .related-product-info h4 {
      font-size: 1.5rem;
      color: #1e293b;
      margin-bottom: 0.75rem;
      font-weight: 800;
    }
    
    .related-product-price {
      font-size: 2rem;
      font-weight: 800;
      color: #10b981;
      margin-bottom: 1rem;
    }
    
    .related-product-link {
      display: inline-block;
      padding: 0.75rem 1.5rem;
      background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      transition: all 0.3s ease;
      align-self: flex-start;
    }
    
    .related-product-link:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }
    
    @media (max-width: 1024px) {
      .product-detail-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
      }
      
      .related-product-card {
        grid-template-columns: 250px 1fr;
        gap: 1rem;
        padding: 1rem;
      }
      
      .related-product-card img {
        height: 220px;
      }
    }
    
    @media (max-width: 768px) {
      .product-title {
        font-size: 1.5rem;
      }
      
      .product-price-large {
        font-size: 1.75rem;
      }
      
      .product-actions {
        flex-direction: column;
      }
      
      .related-product-card {
        grid-template-columns: 1fr;
        gap: 1rem;
      }
      
      .related-product-card img {
        height: 200px;
      }
      
      .related-product-info h4 {
        font-size: 1.2rem;
      }
      
      .related-product-price {
        font-size: 1.5rem;
      }
    }
    
    @media (max-width: 480px) {
      .product-gallery {
        width: 100%;
      }
      
      .related-product-card {
        grid-template-columns: 1fr;
        gap: 1rem;
        padding: 1rem;
      }
      
      .related-product-card img {
        height: 150px;
      }
      
      .related-product-info h4 {
        font-size: 1rem;
      }
      
      .related-product-price {
        font-size: 1.25rem;
      }
      
      .related-product-link {
        font-size: 0.9rem;
        padding: 0.5rem 1rem;
      }
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

<!-- BREADCRUMB - ELIMINADO -->

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
          <button class="btn btn-outline-dark btn-large" id="btn-comprar-ahora">
            Comprar Ahora
          </button>
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

<script src="../JS/app.js"></script>
<script src="../JS/producto_detalle.js"></script>

</body>
</html>
