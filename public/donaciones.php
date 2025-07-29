<?php
// public/donaciones.php

// Incluir configuración de la base de datos (simulado)
// require_once '../includes/db_connection.php'; 
// function getDBConnection() { /* ... */ }

// Lógica para mostrar la página de donaciones
$proyectos_activos = []; // Simular datos de proyectos

// En un entorno real, aquí iría la consulta a la BD
/*
try {
    $conn = getDBConnection();
    $stmt = $conn->query("SELECT id_proyecto, nombre, descripcion FROM PROYECTO WHERE fecha_fin >= CURDATE()");
    $proyectos_activos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error al cargar proyectos: " . $e->getMessage());
    $error_mensaje = "No se pudieron cargar los proyectos en este momento. Inténtelo más tarde.";
}
*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Haz tu Donación! - ONG Esperanza</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        /* Algunos estilos rápidos para la página de donaciones */
        .donation-section {
            padding: 60px 0;
            background-color: #f9f9f9;
            text-align: center;
        }
        .donation-options {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 40px;
            flex-wrap: wrap;
        }
        .option-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            padding: 30px;
            width: 300px;
            text-align: left;
            transition: transform 0.3s ease;
        }
        .option-card:hover {
            transform: translateY(-5px);
        }
        .option-card h3 {
            color: #2c3e50;
            margin-bottom: 15px;
        }
        .option-card p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .btn-donate {
            background-color: #28a745;
            color: white;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
        }
        .btn-donate:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <header>
        <!-- Similar a lo que ya tienes en otros archivos, por ejemplo, index.php -->
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="proyectos.php">Proyectos</a></li>
                <li><a href="eventos.php">Eventos</a></li>
                <li><a href="voluntarios.php">Voluntarios</a></li>
                <li><a href="donaciones.php" class="active">Donar</a></li>
                <!-- Otros enlaces -->
            </ul>
        </nav>
    </header>

    <main>
        <section class="hero-section" style="background-image: url('assets/images/hero-donaciones.jpg');">
            <div class="hero-content">
                <h1>Tu Ayuda Transforma Vidas</h1>
                <p>Cada donación nos acerca a hacer una diferencia real en nuestra comunidad.</p>
                <a href="#donar-ahora" class="btn-primary">¡Haz tu Donación Ahora!</a>
            </div>
        </section>

        <section id="donar-ahora" class="donation-section">
            <div class="container">
                <h2>¿Cómo deseas contribuir?</h2>
                <p class="section-intro">Elige la opción que mejor se adapte a ti y apoya nuestros proyectos.</p>
                
                <div class="donation-options">
                    <div class="option-card">
                        <h3>Donación Única</h3>
                        <p>Realiza una contribución de una sola vez al proyecto que más te inspire.</p>
                        <a href="formulario-donacion-unica.php" class="btn-donate">Donar Ahora</a>
                    </div>
                    
                    <div class="option-card">
                        <h3>Donación Recurrente</h3>
                        <p>Únete a nuestro programa de socios y contribuye mensualmente para un impacto sostenido.</p>
                        <a href="formulario-donacion-recurrente.php" class="btn-donate">Hacerme Socio</a>
                    </div>
                    
                    <div class="option-card">
                        <h3>Donar a Proyectos Específicos</h3>
                        <p>Elige directamente a qué proyecto de la ONG Esperanza quieres que vaya tu apoyo.</p>
                        <a href="proyectos.php" class="btn-donate">Ver Proyectos</a>
                    </div>
                </div>

                <?php if (!empty($proyectos_activos)): ?>
                    <div style="margin-top: 50px;">
                        <h3>Proyectos Destacados</h3>
                        <div class="project-list" style="display: flex; justify-content: center; flex-wrap: wrap; gap: 20px;">
                            <?php foreach ($proyectos_activos as $proyecto): ?>
                                <div class="project-item" style="border: 1px solid #ddd; padding: 15px; border-radius: 8px; width: 280px; text-align: left;">
                                    <h4><?php echo htmlspecialchars($proyecto['nombre']); ?></h4>
                                    <p><?php echo htmlspecialchars(substr($proyecto['descripcion'], 0, 100)); ?>...</p>
                                    <a href="proyecto-detalle.php?id=<?php echo $proyecto['id_proyecto']; ?>" class="btn-secondary">Más Información</a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <p style="margin-top: 30px;">No hay proyectos activos para mostrar en este momento, pero puedes apoyar nuestra misión general.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <footer>
        <!-- Similar a tu footer existente -->
        <p>&copy; <?php echo date("Y"); ?> ONG Esperanza. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
