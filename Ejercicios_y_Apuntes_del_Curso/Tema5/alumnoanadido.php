<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Alumno</title>
</head>

<body>

    <h1>Información del Alumno Añadido</h1>

    <?php
    // Modifico desde el instituto
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capturar los datos enviados desde el formulario
        $nombre = $_POST['nombre'] ?? '';
        $apellidos = $_POST['apellidos'] ?? '';
        $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
        $correo = $_POST['correo'] ?? '';
        $lenguajes = $_POST['lenguajes'] ?? [];
        $sabe_web = $_POST['sabe_web'] ?? '';
        $comentarios = $_POST['comentarios'] ?? '';
        $contrasena = $_POST['contrasena'] ?? '';
        $repite_contrasena = $_POST['repite_contrasena'] ?? '';

        // Mostrar la información
        echo "<p> Nombre:  $nombre</p>";
        echo "<p> Apellidos:  $apellidos</p>";
        echo "<p> Fecha de Nacimiento:  $fecha_nacimiento</p>";
        echo "<p> Correo Electrónico:  $correo</p>";
        echo "<p> Lenguajes de Programación Conocidos:  " . implode(', ', $lenguajes) . "</p>";
        echo "<p> ¿Sabe crear páginas web estáticas?:  $sabe_web</p>";
        echo "<p> Comentarios:  $comentarios</p>";

        // Validar las contraseñas
        if ($contrasena === $repite_contrasena) {
            echo "<p>Contraseña:La contraseña coincide.</p>";
        } else {
            echo "<p>Contraseña:La contraseña no coincide.</p>";
        }
    } else {
        echo "<p>No se ha enviado ningún dato.</p>";
    }
    ?>

    <br>
    <a href="alumnoAlta.php">Volver al formulario de alta</a>
</body>

</html>