<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="img/favicon.ico">
  <title>Lubricentro R/18 - Servicio Automotriz</title>
  
  <link rel="stylesheet" href="css/styles.css?v=<?php echo filemtime('css/styles.css'); ?>" />
  
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
  
</head>
<body>

<header>
  <div class="nav-container container">
    <h1 class="logo">🔧 Lubricentro R/18</h1>
    <button class="menu-toggle" id="menu-toggle">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <nav>
      <ul class="nav-menu" id="nav-menu">
        <li><a href="index.php" class="nav-link active">Inicio</a></li>
        <li><a href="pages/listado_box.php" class="nav-link">Catálogo</a></li>
        <li><a href="pages/comprar.php" class="nav-link">Comprar</a></li>
        <li><a href="pages/carrito.php" class="nav-link cart-link">
          <span class="cart-icon">🛒</span>
          <span class="cart-badge" id="cart-count">0</span>
        </a></li>
      </ul>
    </nav>
  </div>
</header>

<main>
  <section class="hero-section">
    <div class="container hero-content">
      <h2 class="hero-title">Tu Solución Automotriz Integral</h2>
      <p class="hero-subtitle">Mantenimiento experto y los mejores lubricantes. ¡Envíos a todo el país!</p>
      <div class="hero-actions">
        <a href="pages/listado_box.php" class="btn btn-primary btn-large">Comprar Ahora</a>
        <a href="pages/comprar.php" class="btn btn-outline btn-large">Solicitar Servicio</a>
      </div>
    </div>
  </section>
  
  <section class="services-section">
    <div class="container">
      <div class="services-grid">
        <div class="service-card">
          <h3>📦 Envíos Rápidos</h3>
          <p>Recibe tu pedido en 24/48h.</p>
        </div>
        <div class="service-card">
          <h3>💳 Cuotas sin interés</h3>
          <p>Múltiples medios de pago disponibles.</p>
        </div>
        <div class="service-card">
          <h3>⚙️ Asesoramiento Experto</h3>
          <p>Consulta a nuestros técnicos especializados.</p>
        </div>
        <div class="service-card">
          <h3>✅ Garantía de Calidad</h3>
          <p>Solo productos originales y certificados.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="featured-products-section">
    <div class="container">
      <h2 class="section-title">✨ Productos Destacados</h2>
      <p class="section-subtitle">Lo más vendido y recomendado por nuestros expertos</p>
      
      <div class="products-carousel" id="carrusel-productos">
        <p style="text-align: center; padding: 20px; color: var(--color-text-light);">Cargando productos...</p>
      </div>
      
      <div class="text-center mt-4" style="text-align: center; margin-top: 3rem;">
        <a href="pages/listado_box.php" class="btn btn-primary">Ver Catálogo Completo</a>
      </div>
    </div>
  </section>

  <section class="testimonials-section">
    <div class="container">
      <h2 class="section-title">💬 Lo que Dicen Nuestros Clientes</h2>
      <p class="section-subtitle">Nuestra mejor garantía es tu satisfacción</p>
      
      <div class="testimonials-carousel">
        <div class="testimonial-card">
          <p>"Excelente servicio y atención! Mi auto quedó como nuevo después del cambio de aceite."</p>
          <small>— Juan P.</small>
        </div>
        <div class="testimonial-card">
          <p>"Tienen todos los lubricantes que necesito y a buen precio. Rápida entrega."</p>
          <small>— María G.</small>
        </div>
        <div class="testimonial-card">
          <p>"Un verdadero taller de confianza. Me solucionaron un problema que nadie más encontraba."</p>
          <small>— Roberto A.</small>
        </div>
        <div class="testimonial-card">
          <p>"Profesionales y transparentes. Recomiendo Lubricentro R/18 sin dudar."</p>
          <small>— Luciana S.</small>
        </div>
      </div>
    </div>
  </section>

</main>

<footer>
  <div class="container">
    <div class="footer-content">
      <div class="footer-section">
        <h3>🔧 Lubricentro R/18</h3>
        <p>Tu aliado en el mantenimiento automotriz desde 2010. Experiencia y calidad garantizada.</p>
      </div>
      
      <div class="footer-section">
        <h4>Enlaces Rápidos</h4>
        <ul class="footer-links">
          <li><a href="index.php">Inicio</a></li>
          <li><a href="pages/listado_box.php">Productos</a></li>
          <li><a href="pages/comprar.php">Solicitar Servicio</a></li>
          <li><a href="pages/carrito.php">Mi Carrito</a></li>
        </ul>
      </div>
      
      <div class="footer-section">
        <h4>Contacto</h4>
        <ul class="footer-links">
          <li>Tel: (011) 4567-8900</li>
          <li>Email: info@lubricentror18.com</li>
          <li>Dirección: Av. Principal 123, Ciudad</li>
        </ul>
      </div>
    </div>
    
    <div class="footer-bottom">
      <p>&copy; 2024 Lubricentro R/18. Todos los derechos reservados.</p>
    </div>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script src="JS/app.js?v=<?php echo filemtime('JS/app.js'); ?>"></script>
<script src="JS/productos.js?v=<?php echo filemtime('JS/productos.js'); ?>"></script>

<script>
$(document).ready(function(){
  // Carrusel de productos (Ajuste Final para ver 4 productos de una vez)
  $('.products-carousel').slick({
    dots: true,
    infinite: true,
    speed: 500,
    slidesToShow: 4, // Mostrar 4 productos en escritorio
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: true, 
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1, 
          slidesToScroll: 1,
          arrows: false
        }
      }
    ]
  });

  // Carrusel de testimonios
  $('.testimonials-carousel').slick({
    dots: true,
    infinite: true,
    speed: 500,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 4000,
    arrows: true, 
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false
        }
      }
    ]
  });
});
</script>

</body>
</html>