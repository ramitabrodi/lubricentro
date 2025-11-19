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