<?php
// Conexión a la Base de Datos
$servidor = "localhost: 3307";
$usuario  = "root";
$password = "1234"; 
$base_datos = "paginapersonal";

$conexion = new mysqli($servidor, $usuario, $password, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$mensaje_exito = "";
$mensaje_error = "";

// DETECTAR SI EL USUARIO PRESIONÓ EL BOTÓN "ENVIAR"
if (isset($_POST['enviar'])) {
    
    // Sanitización básica para evitar inyecciones de código malicioso
    $nombre_raw  = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $correo_raw  = mysqli_real_escape_string($conexion, $_POST['correo']);
    $mensaje_raw = mysqli_real_escape_string($conexion, $_POST['mensaje']);
    
    // Quitar los Espacios en Blanco Dentro del Correo Electrónico
    $correo_limpio = str_replace(' ', '', trim($correo_raw));
    
    // Que la Primera Letra Sea Mayúscula y lo Demás Minúscula
    $nombre_limpio = ucwords(strtolower(trim($nombre_raw)));

    // Limpiar espacios innecesarios en los extremos del mensaje
    $mensaje_limpio = trim($mensaje_raw);

    // Validación del Lado del Servidor (PHP)
    if (empty($nombre_limpio) || empty($correo_limpio) || empty($mensaje_limpio)) {
        $mensaje_error = "Por favor, rellene todos los campos correctamente.";
    } elseif (!filter_var($correo_limpio, FILTER_VALIDATE_EMAIL)) {
        $mensaje_error = "El formato del correo electrónico no es válido.";
    } else {
        
        // Inserción de los Datos Limpios a la Base de Datos
        $sql = "INSERT INTO mensajes (nombre, correo, mensaje) VALUES ('$nombre_limpio', '$correo_limpio', '$mensaje_limpio')";
        
        if ($conexion->query($sql) === TRUE) {
            $mensaje_exito = "¡Gracias " . $nombre_limpio . "! Tu mensaje ha sido enviado y registrado con éxito.";
        } else {
            $mensaje_error = "Hubo un error al guardar los datos: " . $conexion->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Contacto</title>
</head>
<body>
    <header class="header">
        <div class="logo">
            &lt;/&gt; Juan Conza
        </div>
        <nav class="nav">
            <a href="index.html">Inicio</a>
            <a href="contacto.php" class="active">Contacto</a>
        </nav>
    </header>

    <main class="contenedor-principal">
        <section class="seccion-contacto">
            <h1 style="text-align: center; margin-bottom: 0.5rem;">Ponte en Contacto</h1>
            <p style="text-align: center; color: var(--texto-secondary); margin-bottom: 2rem;">
                Déjame un mensaje y te responderé lo antes posible.
            </p>

            <?php if (!empty($mensaje_exito)): ?>
                <div style="background-color: #d1fae5; color: #065f46; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; text-align: center; font-weight: bold; border: 1px solid #a7f3d0;">
                    <?php echo $mensaje_exito; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($mensaje_error)): ?>
                <div style="background-color: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; text-align: center; font-weight: bold; border: 1px solid #fca5a5;">
                    <?php echo $mensaje_error; ?>
                </div>
            <?php endif; ?>
            <form action="contacto.php" method="POST" class="formulario-contacto">
                
                <div class="grupo-input">
                    <label for="nombre">Nombres:</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Nombres" required>
                </div>

                <div class="grupo-input">
                    <label for="correo">Correo:</label>
                    <input type="email" id="correo" name="correo" placeholder="Correo" required>
                </div>

                <div class="grupo-input">
                    <label for="mensaje">Mensaje:</label>
                    <textarea id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje aquí..." required></textarea>
                </div>

                <button type="submit" name="enviar" class="btn-enviar">Enviar Mensaje</button>

            </form>
        </section>
    </main><br><br><br><br>

    <footer class="footer">
        <p>&copy; 2026 Juan Conza. Todos los derechos reservados. | Tarea de Desarrollo Web</p>
    </footer>
</body>
</html>