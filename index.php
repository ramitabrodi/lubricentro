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

<main>
  <!-- HERO -->
  <section class="hero" style="background-image: url('img/fondo.hero.webp.jpg') !important; background-size: cover !important; background-position: center !important; background-repeat: no-repeat !important; min-height: 800px; display: flex; align-items: center; justify-content: center;">
    <div class="hero-overlay" style="background: rgba(0, 0, 0, 0.4); position: absolute; top: 0; left: 0; right: 0; bottom: 0;"></div>
    <div class="container hero-content" style="position: relative; z-index: 10; text-align: center; padding: 8rem 2rem;">
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

  <!-- PRODUCTOS DESTACADOS -->
  <section class="seccion-productos">
    <div class="container">
      <h2 class="section-title" style="color: white;">Productos Destacados</h2>
      <p class="section-subtitle" style="color: #e0e7ff;">Los mejores productos de nuestra tienda</p>
      <div class="products-grid" id="productos-destacados">
        <p style="text-align: center; grid-column: 1/-1;">Cargando productos...</p>
      </div>
      <div class="text-center" style="margin-top: 4rem; margin-bottom: 6rem;">
        <a href="pages/listado_box.php" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.1rem;">
          <span>Ver Todos los Productos</span>
          <span class="btn-arrow">→</span>
        </a>
      </div>
    </div>
  </section>

  <!-- SERVICIOS -->
  <section class="seccion-servicios" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #7e8ba3 100%);">
    <div class="container">
      <h2 class="section-title" style="color: white;">Nuestros Servicios</h2>
      <p class="section-subtitle" style="color: #e0e7ff;">Todo lo que tu vehículo necesita en un solo lugar</p>

      <div class="services-grid">
        <div class="service-card">
          <div class="service-icon">🛢️</div>
          <h3>Cambio de Aceite</h3>
          <p>Mantene tu motor al maximo rendimiento con lubricantes de alta calidad.</p>
          <a href="#" class="service-link">Saber mas →</a>
        </div>

        <div class="service-card">
          <div class="service-icon">🔧</div>
          <h3>Cambio de Filtros</h3>
          <p>Reemplazo de filtros de aire, aceite y combustible con repuestos originales.</p>
          <a href="#" class="service-link">Saber mas →</a>
        </div>

        <div class="service-card">
          <div class="service-icon">💻</div>
          <h3>Diagnostico Computarizado</h3>
          <p>Revision completa del sistema electronico de tu vehiculo.</p>
          <a href="#" class="service-link">Saber mas →</a>
        </div>

        <div class="service-card">
          <div class="service-icon">🔩</div>
          <h3>Mantenimiento General</h3>
          <p>Inspeccion y reparacion de componentes criticos para la seguridad.</p>
          <a href="#" class="service-link">Saber mas →</a>
        </div>
      </div>
    </div>
  </section>

  <!-- TESTIMONIOS -->
  <section class="testimonials-section">
    <div class="container">
      <h2 class="section-title">💬 Lo que dicen nuestros clientes</h2>
      <p class="section-subtitle">Opiniones reales de quienes confian en nosotros</p>

      <div class="testimonials-carousel">
        <div>
          <div class="testimonial-card">
            <div class="testimonial-avatar">👨</div>
            <p class="testimonial-text">"Excelente atencion y servicio rapido. Siempre traigo mi auto aca para el cambio de aceite. Los recomiendo 100%."</p>
            <p class="testimonial-author">Carlos Martinez</p>
            <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
          </div>
        </div>

        <div>
          <div class="testimonial-card">
            <div class="testimonial-avatar">👩</div>
            <p class="testimonial-text">"Muy profesionales y honestos. Me explicaron todo el proceso y los precios son muy accesibles. Volvere sin dudas."</p>
            <p class="testimonial-author">Maria Gonzalez</p>
            <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
          </div>
        </div>

        <div>
          <div class="testimonial-card">
            <div class="testimonial-avatar">👨</div>
            <p class="testimonial-text">"El mejor lubricentro de la zona. Tienen productos de primera calidad y el servicio es impecable. Muy recomendable."</p>
            <p class="testimonial-author">Roberto Fernandez</p>
            <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
          </div>
        </div>

        <div>
          <div class="testimonial-card">
            <div class="testimonial-avatar">👩</div>
            <p class="testimonial-text">"Atencion personalizada y precios justos. Resolvieron un problema que tenia hace tiempo. Muy satisfecha con el resultado."</p>
            <p class="testimonial-author">Ana Lopez</p>
            <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
          </div>
        </div>

        <div>
          <div class="testimonial-card">
            <div class="testimonial-avatar">👨</div>
            <p class="testimonial-text">"Trabajo prolijo y garantizado. Ya son varios anos que vengo y nunca tuve problemas. Son de confianza total."</p>
            <p class="testimonial-author">Jorge Ramirez</p>
            <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- POR QUE ELEGIRNOS -->
  <section class="seccion-nosotros">
    <div class="container">
      <h2 class="section-title" style="color: white;">Por que elegirnos?</h2>
      <p class="section-subtitle" style="color: #e0e7ff;">Garantia de calidad en cada servicio</p>
      
      <div class="contact-grid">
        <div class="contact-card">
          <h3>✓ Profesionales Certificados</h3>
          <p>Personal capacitado con anos de experiencia en el sector automotriz.</p>
        </div>
        
        <div class="contact-card">
          <h3>✓ Productos Originales</h3>
          <p>Utilizamos unicamente repuestos y lubricantes de marcas reconocidas.</p>
        </div>
        
        <div class="contact-card">
          <h3>✓ Garantia de Servicio</h3>
          <p>Garantizamos la calidad de nuestro trabajo con cobertura completa.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CONTACTO -->
  <section class="seccion-contacto">
    <div class="container">
      <h2 class="section-title">Contacto</h2>
      <p class="section-subtitle">Visitanos o comunicate con nosotros</p>
      
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; align-items: start;">
        <!-- INFORMACIÓN DE CONTACTO IZQUIERDA -->
        <div class="contact-grid" style="grid-template-columns: 1fr; gap: 1.5rem;">
          
          <div class="contact-card" style="background: rgba(255, 255, 255, 0.95); border-left-color: #2563eb;">
            <h3 style="color: #1e293b;">WhatsApp</h3>
            <p style="color: #475569;">Chatea directamente con nosotros</p>
            <a href="https://wa.me/541155551234" target="_blank" class="btn btn-primary" style="margin-top: 1rem; display: inline-block; background: #25D366; border-color: #25D366; color: white; font-weight: bold;">Abrir WhatsApp</a>
          </div>
          
          <div class="contact-card" style="background: rgba(255, 255, 255, 0.95); border-left-color: #2563eb;">
            <h3 style="color: #1e293b;">Telefono</h3>
            <p style="color: #1e293b;"><strong>(011) 5555-1234</strong></p>
            <p style="font-size: 0.9em; color: #475569;">Llamadas y consultas</p>
          </div>
          
          <div class="contact-card" style="background: rgba(255, 255, 255, 0.95); border-left-color: #2563eb;">
            <h3 style="color: #1e293b;">Email</h3>
            <p style="color: #1e293b;"><strong>info@lubricentro.com</strong></p>
            <p style="font-size: 0.9em; color: #475569;">Respuesta en 24 horas</p>
          </div>
          
          <div class="contact-card" style="background: rgba(255, 255, 255, 0.95); border-left-color: #2563eb;">
            <h3 style="color: #1e293b;">Horarios</h3>
            <p style="color: #1e293b;"><strong>Lunes a Viernes:</strong> 8:00 - 18:00</p>
            <p style="color: #1e293b;"><strong>Sabado:</strong> 9:00 - 14:00</p>
            <p style="color: #fbbf24; margin-top: 0.5rem; font-weight: bold;">Domingo: Cerrado</p>
          </div>
        </div>
        
        <!-- MAPA DERECHA -->
        <div style="width: 100%; height: 550px; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
          <div class="contact-card" style="margin-bottom: 1.5rem; height: auto;">
            <h3>Ubicacion</h3>
            <p><strong>Lubricentro R/18</strong></p>
            <p style="font-size: 0.9em; color: #475569;">Posadas, Misiones</p>
            <a href="https://www.google.com/maps/place/Lubricentro+R%2F18/@-27.3692477,-55.9173483,17z/data=!3m1!4b1!4m6!3m5!1s0x9457bf2af867ce59:0x65bb88b6356071c3!8m2!3d-27.3692525!4d-55.9147734!16s%2Fg%2F11mx4vy2cf?entry=ttu&g_ep=EgoyMDI1MTExNi4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="btn btn-primary" style="margin-top: 1rem; display: inline-block; background: #2563eb; border-color: #2563eb; color: white; font-weight: bold;">Ver en Google Maps</a>
          </div>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3279.8563445456287!2d-55.91734832346908!3d-27.369247700000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9457bf2af867ce59%3A0x65bb88b6356071c3!2sLubricentro%20R%2F18!5e0!3m2!1ses!2sar!4v1700000000000" width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </section>

</main>

<!-- FOOTER -->
<footer>
  <div class="container">
    <div class="footer-content">
      <div class="footer-section">
        <h3>Lubricentro R/18</h3>
        <p>Servicio profesional de mantenimiento automotriz desde 2018.</p>
      </div>
      <div class="footer-section">
        <h3>Enlaces Rapidos</h3>
        <a href="index.php">Inicio</a>
        <a href="pages/listado_box.php">Productos</a>
        <a href="pages/comprar.php">Comprar</a>
        <a href="pages/carrito.php">Carrito</a>
      </div>
      <div class="footer-section">
        <h3>Horarios</h3>
        <p>Lunes a Viernes: 8:00 - 18:00</p>
        <p>Sabado: 9:00 - 14:00</p>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2025 Lubricentro R/18. Todos los derechos reservados.</p>
    </div>
  </div>
</footer>

<!-- SCRIPTS -->
<script src="JS/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<!-- SCRIPTS -->
<script src="JS/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script>
  console.log('=== INICIO DE SCRIPT ===');
  
  document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM Cargado');
    
    // Cargar productos destacados desde API
    fetch('api/productos.php?action=destacados')
      .then(r => r.json())
      .then(d => {
        console.log('API Response:', d);
        const c = document.getElementById('productos-destacados');
        if (d.data && d.data.length > 0) {
          c.innerHTML = d.data.map((p, idx) => {
            const imagenesMap = [
              'aceite_mineral.jpg',
              'aceite_semi.jpg',
              'castrol.jpg',
              'filtro_aceite.jpg',
              'filtro_aire.jpg',
              'filtro_combustible.jpg'
            ];
            
            const imagen = imagenesMap[idx % imagenesMap.length];
            
            return '<div class="product-card">' +
              '<div class="product-badge">Destacado</div>' +
              '<div style="width: 100%; height: 250px; background: #f3f4f6; display: flex; align-items: center; justify-content: center; color: #999; font-size: 14px; border-radius: 8px; overflow: hidden;">' +
              '<img src="img/' + imagen + '" alt="' + p.nombre + '" style="width: 100%; height: 100%; object-fit: cover;" />' +
              '</div>' +
              '<div class="product-info">' +
              '<h4>' + p.nombre + '</h4>' +
              '<p class="product-brand">' + (p.descripcion || 'Producto de calidad') + '</p>' +
              '<div class="product-footer">' +
              '<span class="product-price">$' + parseFloat(p.precio).toFixed(2) + '</span>' +
              '<button class="btn-add-cart" onclick="agregarAlCarrito({id: ' + p.id + ', nombre: \'' + p.nombre.replace(/'/g, "\\'") + '\', precio: ' + p.precio + '})">' +
              '<span>+</span>' +
              '</button>' +
              '</div>' +
              '</div>' +
              '</div>';
          }).join('');
        }
      })
      .catch(e => console.error('Error:', e));
    
    // Inicializar carrusel de testimonios CON JQUERY (requisito del profesor)
    if (jQuery) {
      console.log('jQuery cargado - Inicializando carrusel de testimonios');
      jQuery('.testimonials-carousel').slick({
        dots: true,
        arrows: true,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              arrows: false
            }
          }
        ]
      });
      console.log('Carrusel inicializado correctamente');
    }

    // Actualizar contador del carrito
    const carrito = JSON.parse(localStorage.getItem('carrito') || '[]');
    document.getElementById('cart-count').textContent = carrito.length;
  });
</script>

</body>
</html>
