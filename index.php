<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="img/favicon.ico">
  <title>Lubricentro R/18 - Servicio Automotriz</title>
  <link rel="stylesheet" href="css/styles.css" />
  <script src="JS/productos.js"></script>
  
  <!-- Slick Carousel CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
  
  <style>
    /* Estilos personalizados para Slick */
    .slick-slider {
      margin: 0 -15px;
    }
    
    .slick-slide {
      padding: 0 15px;
    }
    
    .slick-dots {
      bottom: -45px;
    }
    
    .slick-dots li button:before {
      font-size: 12px;
      color: #1A3A5F;
    }
    
    .slick-prev, .slick-next {
      width: 40px;
      height: 40px;
      z-index: 1;
    }
    
    .slick-prev {
      left: -50px;
    }
    
    .slick-next {
      right: -50px;
    }
    
    .slick-prev:before, .slick-next:before {
      font-size: 40px;
      color: #1A3A5F;
    }
    
    @media (max-width: 768px) {
      .slick-prev {
        left: 0;
      }
      .slick-next {
        right: 0;
      }
    }
    
    /* Carrusel de testimonios */
    .testimonials-section {
      background: #f8f9fa;
      padding: 5rem 0;
    }
    
    .testimonial-card {
      background: white;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
      text-align: center;
      margin: 1rem;
    }
    
    .testimonial-avatar {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      margin: 0 auto 1rem;
      background: linear-gradient(135deg, #1A3A5F, #2c5282);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2rem;
      color: white;
    }
    
    .testimonial-text {
      font-style: italic;
      color: #666;
      margin-bottom: 1rem;
      line-height: 1.8;
    }
    
    .testimonial-author {
      font-weight: 600;
      color: #1A3A5F;
      margin-bottom: 0.25rem;
    }
    
    .testimonial-rating {
      color: #FFA500;
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

<!-- HERO -->
<section class="hero">
  <div class="hero-overlay"></div>
  <div class="container hero-content">
    <h2 class="hero-title">Mantenimiento Automotriz Profesional</h2>
    <p class="hero-subtitle">
      Servicio completo, rápido y confiable para mantener tu vehículo en perfecto estado
    </p>
    <div class="hero-buttons">
      <a href="pages/listado_box.php" class="btn btn-primary">
        <span>Ver Productos</span>
        <span class="btn-arrow">→</span>
      </a>
      <a href="pages/comprar.php" class="btn btn-secondary">Comprar Ahora</a>
    </div>
  </div>
</section>

<!-- SERVICIOS -->
<section class="seccion-servicios">
  <div class="container">
    <h2 class="section-title">Nuestros Servicios</h2>
    <p class="section-subtitle">Todo lo que tu vehículo necesita en un solo lugar</p>
    
    <div class="services-grid">
      <div class="service-card">
        <div class="service-icon">🛢️</div>
        <h3>Cambio de Aceite</h3>
        <p>Mantené tu motor al máximo rendimiento con lubricantes de alta calidad.</p>
        <a href="#" class="service-link">Saber más →</a>
      </div>
      
      <div class="service-card">
        <div class="service-icon">🔧</div>
        <h3>Cambio de Filtros</h3>
        <p>Reemplazo de filtros de aire, aceite y combustible con repuestos originales.</p>
        <a href="#" class="service-link">Saber más →</a>
      </div>
      
      <div class="service-card">
        <div class="service-icon">💻</div>
        <h3>Diagnóstico Electrónico</h3>
        <p>Chequeo completo del sistema con equipamiento de diagnóstico avanzado.</p>
        <a href="#" class="service-link">Saber más →</a>
      </div>
      
      <div class="service-card">
        <div class="service-icon">⚙️</div>
        <h3>Balanceo y Alineación</h3>
        <p>Tu vehículo estable, seguro y alineado con precisión.</p>
        <a href="#" class="service-link">Saber más →</a>
      </div>
    </div>
  </div>
</section>

<!-- PRODUCTOS DESTACADOS CON SLICK CAROUSEL -->
<section class="featured-section">
  <div class="container">
    <h2 class="section-title">🔥 Productos Destacados</h2>
    <p class="section-subtitle">Los más vendidos de nuestra tienda - Navegá con las flechas</p>
    
    <div class="products-carousel">
      <!-- Producto 1 -->
      <div>
        <div class="product-card">
          <div class="product-badge">Más Vendido</div>
          <img src="img/aceite_mineral.jpg" alt="Aceite Motor Mineral">
          <div class="product-info">
            <h4>Aceite Motor Mineral</h4>
            <p class="product-brand">Shell - 20W-50</p>
            <div class="product-footer">
              <span class="product-price">$8.500</span>
              <button onclick="agregarAlCarrito({id:'MOT001', nombre:'Aceite Motor Mineral Shell 20W-50', precio:'$8.500'})" class="btn-add-cart">
                <span>+</span>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Producto 2 -->
      <div>
        <div class="product-card">
          <img src="img/aceite_semi.jpg" alt="Aceite Motor Semisintético">
          <div class="product-info">
            <h4>Aceite Motor Semisintético</h4>
            <p class="product-brand">Mobil - 10W-40</p>
            <div class="product-footer">
              <span class="product-price">$12.800</span>
              <button onclick="agregarAlCarrito({id:'MOT002', nombre:'Aceite Motor Semisintético Mobil 10W-40', precio:'$12.800'})" class="btn-add-cart">
                <span>+</span>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Producto 3 -->
      <div>
        <div class="product-card">
          <div class="product-badge premium">Premium</div>
          <img src="img/castrol.jpg" alt="Aceite Motor Sintético">
          <div class="product-info">
            <h4>Aceite Motor Sintético</h4>
            <p class="product-brand">Castrol - 5W-30</p>
            <div class="product-footer">
              <span class="product-price">$18.900</span>
              <button onclick="agregarAlCarrito({id:'MOT003', nombre:'Aceite Motor Sintético Castrol 5W-30', precio:'$18.900'})" class="btn-add-cart">
                <span>+</span>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Producto 4 -->
      <div>
        <div class="product-card">
          <img src="img/filtro_aceite.jpg" alt="Filtro de Aceite">
          <div class="product-info">
            <h4>Filtro de Aceite</h4>
            <p class="product-brand">Mann Filter</p>
            <div class="product-footer">
              <span class="product-price">$2.300</span>
              <button onclick="agregarAlCarrito({id:'FIL001', nombre:'Filtro de Aceite Mann Filter', precio:'$2.300'})" class="btn-add-cart">
                <span>+</span>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Producto 5 -->
      <div>
        <div class="product-card">
          <img src="img/filtro_aire.jpg" alt="Filtro de Aire">
          <div class="product-info">
            <h4>Filtro de Aire</h4>
            <p class="product-brand">Bosch</p>
            <div class="product-footer">
              <span class="product-price">$3.450</span>
              <button onclick="agregarAlCarrito({id:'FIL002', nombre:'Filtro de Aire Bosch', precio:'$3.450'})" class="btn-add-cart">
                <span>+</span>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Producto 6 -->
      <div>
        <div class="product-card">
          <img src="img/filtro_combustible.jpg" alt="Filtro de Combustible">
          <div class="product-info">
            <h4>Filtro de Combustible</h4>
            <p class="product-brand">Fram</p>
            <div class="product-footer">
              <span class="product-price">$2.800</span>
              <button onclick="agregarAlCarrito({id:'FIL003', nombre:'Filtro de Combustible Fram', precio:'$2.800'})" class="btn-add-cart">
                <span>+</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="text-center" style="margin-top: 4rem;">
      <a href="pages/listado_box.php" class="btn btn-outline-dark">Ver Todos los Productos</a>
    </div>
  </div>
</section>

<!-- TESTIMONIOS CON SLICK CAROUSEL -->
<section class="testimonials-section">
  <div class="container">
    <h2 class="section-title">💬 Lo que dicen nuestros clientes</h2>
    <p class="section-subtitle">Opiniones reales de quienes confían en nosotros</p>
    
    <div class="testimonials-carousel">
      <div>
        <div class="testimonial-card">
          <div class="testimonial-avatar">👨</div>
          <p class="testimonial-text">"Excelente atención y servicio rápido. Siempre traigo mi auto acá para el cambio de aceite. Los recomiendo 100%."</p>
          <p class="testimonial-author">Carlos Martínez</p>
          <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
        </div>
      </div>

      <div>
        <div class="testimonial-card">
          <div class="testimonial-avatar">👩</div>
          <p class="testimonial-text">"Muy profesionales y honestos. Me explicaron todo el proceso y los precios son muy accesibles. Volveré sin dudas."</p>
          <p class="testimonial-author">María González</p>
          <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
        </div>
      </div>

      <div>
        <div class="testimonial-card">
          <div class="testimonial-avatar">👨</div>
          <p class="testimonial-text">"El mejor lubricentro de la zona. Tienen productos de primera calidad y el servicio es impecable. Muy recomendable."</p>
          <p class="testimonial-author">Roberto Fernández</p>
          <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
        </div>
      </div>

      <div>
        <div class="testimonial-card">
          <div class="testimonial-avatar">👩</div>
          <p class="testimonial-text">"Atención personalizada y precios justos. Resolvieron un problema que tenía hace tiempo. Muy satisfecha con el resultado."</p>
          <p class="testimonial-author">Ana López</p>
          <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
        </div>
      </div>

      <div>
        <div class="testimonial-card">
          <div class="testimonial-avatar">👨</div>
          <p class="testimonial-text">"Trabajo prolijo y garantizado. Ya son varios años que vengo y nunca tuve problemas. Son de confianza total."</p>
          <p class="testimonial-author">Jorge Ramírez</p>
          <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- NOSOTROS -->
<section class="seccion-nosotros">
  <div class="container">
    <h2 class="section-title">¿Por qué elegirnos?</h2>
    <p class="section-subtitle">Experiencia y calidad en cada servicio</p>
    
    <div class="benefits-grid">
      <div class="benefit-item">
        <div class="benefit-icon">🏆</div>
        <h3>15+ Años</h3>
        <p>De experiencia en el mercado</p>
      </div>
      <div class="benefit-item">
        <div class="benefit-icon">⚡</div>
        <h3>Atención Rápida</h3>
        <p>Servicio personalizado y eficiente</p>
      </div>
      <div class="benefit-item">
        <div class="benefit-icon">✓</div>
        <h3>Productos Originales</h3>
        <p>Marcas líderes del mercado</p>
      </div>
      <div class="benefit-item">
        <div class="benefit-icon">💻</div>
        <h3>Tecnología Avanzada</h3>
        <p>Equipamiento de diagnóstico digital</p>
      </div>
    </div>
  </div>
</section>

<!-- CONTACTO -->
<section class="seccion-contacto">
  <div class="container">
    <div class="contact-grid">
      <div class="contact-info">
        <h2>Contáctanos</h2>
        <p class="contact-text">Estamos para ayudarte con el mantenimiento de tu vehículo</p>
        
        <div class="contact-items">
          <div class="contact-item">
            <span class="contact-icon">📍</span>
            <div>
              <h4>Dirección</h4>
              <p>Av. Posadas Misiones 1234 - Posadas Misiones</p>
            </div>
          </div>
          
          <div class="contact-item">
            <span class="contact-icon">📞</span>
            <div>
              <h4>Teléfono</h4>
              <p>(011) 4444-5555</p>
            </div>
          </div>
          
          <div class="contact-item">
            <span class="contact-icon">✉️</span>
            <div>
              <h4>Email</h4>
              <p>contacto@lubricentror18.com</p>
            </div>
          </div>
        </div>
        
        <a href="https://wa.me/5491144445555" target="_blank" class="btn btn-whatsapp">
          <span>💬</span> Enviar WhatsApp
        </a>
      </div>
      
      <div class="contact-map">
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3543.2070732101342!2d-55.91734832531935!3d-27.3692477124321!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9457bf2af867ce59%3A0x65bb88b6356071c3!2sLubricentro%20R%2F18!5e0!3m2!1ses!2sar!4v1759670777194!5m2!1ses!2sar" 
          width="100%" 
          height="100%" 
          style="border:0; border-radius: 10px;" 
          allowfullscreen="" 
          loading="lazy">
        </iframe>
      </div>
    </div>
  </div>
</section>

<!-- SECCIÓN CARRUSEL DE PRODUCTOS -->
<section class="section">
  <div class="container">
    <h2 class="section-title">Productos Destacados</h2>
    <div id="carrusel-productos" style="min-height: 400px; display: flex; align-items: center; justify-content: center; color: #999;">
      <p>Cargando productos...</p>
    </div>
  </div>
</section>

<!-- SECCIÓN LISTA DE PRODUCTOS -->
<section class="section" style="background-color: #f9f9f9;">
  <div class="container">
    <h2 class="section-title">Catálogo de Productos</h2>
    <div id="lista-productos" style="min-height: 300px; display: flex; align-items: center; justify-content: center; color: #999;">
      <p>Cargando catálogo...</p>
    </div>
    <div style="text-align: center; margin-top: 40px;">
      <a href="pages/admin_productos.php" class="btn" style="display: inline-block; background-color: #4CAF50; color: white; padding: 12px 30px; text-decoration: none; border-radius: 4px;">Agregar Producto</a>
    </div>
  </div>
</section>

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
          <li><a href="index.php">Inicio</a></li>
          <li><a href="pages/listado_box.php">Productos</a></li>
          <li><a href="pages/comprar.php">Comprar</a></li>
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

<!-- jQuery (necesario para Slick) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Slick Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<!-- JavaScript principal -->
<script src="js/app.js"></script>

<!-- Inicialización de Slick Carousel -->
<script>
$(document).ready(function(){
  // Carrusel de productos
  $('.products-carousel').slick({
    dots: true,
    infinite: true,
    speed: 500,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: true,
    responsive: [
      {
        breakpoint: 1024,
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
        breakpoint: 1024,
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

<!-- Inicializar productos al cargar la página -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    console.log('Inicializando productos...');
    inicializarCarrusel();
    inicializarListaProductos();
  });
</script>
</body>
</html>