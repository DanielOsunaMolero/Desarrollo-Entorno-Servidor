<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br><br>
        <label for="nombre">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos"><br><br>

        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"><br><br>

        <label for="nombre">Correo:</label>
        <input type="text" id="correo" name="correo"><br><br>

        
        <label>Que lenguajes conoces?</label>
        <label>C++ <input type="checkbox" name="extras[]" value="C++"></label>
        <label>JavaScript <input type="checkbox" name="extras[]" value="JavaScript"></label>
        <label>PHP <input type="checkbox" name="extras[]" value="PHP"></label>
        <label>Python <input type="checkbox" name="extras[]" value="Python"></label>

        <br>
        <label for="estaticas">Sabes crear paginas webs estaticas?</label>

        <input type="radio" id="si" name="si">Si
        <input type="radio" id="no" name="no">No<br><br>
        
        <label for="comentarios">Comentarios:</label>
        <br>
        <textarea name="comentarios" id="comentarios"></textarea>
        <br>

        <label for="contraseña">Contraseña:</label>
        <input type="text" id="contraseña" name="contraseña">
        <br>
        <label for="rcontraseña">Repite contraseña:</label>
        <input type="text" id="rcontraseña" name="rcontraseña">

        <br>
        <button type="submit">Enviar</button>
    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 1. Capturamos los datos enviados desde el formulario
        $nombre = $_POST['nombre'] ?? '';
        $apellidos = $_POST['apellidos'] ?? '';
        $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
        $correo = $_POST['correo'] ?? '';
        $lenguajes = $_POST['lenguajes'] ?? [];
        $sabe_web = $_POST['sabe_web'] ?? '';
        $comentarios = $_POST['comentarios'] ?? '';
        $contrasena = $_POST['contrasena'] ?? '';
        $repite_contrasena = $_POST['repite_contrasena'] ?? '';

        // 2. Mostrar la información
        echo "<p><strong>Nombre:</strong> $nombre</p>";
        echo "<p><strong>Apellidos:</strong> $apellidos</p>";
        echo "<p><strong>Fecha de Nacimiento:</strong> $fecha_nacimiento</p>";
        echo "<p><strong>Correo Electrónico:</strong> $correo</p>";
        echo "<p><strong>Lenguajes de Programación Conocidos:</strong> " . implode(', ', $lenguajes) . "</p>";
        echo "<p><strong>¿Sabe crear páginas web estáticas?:</strong> $sabe_web</p>";
        echo "<p><strong>Comentarios:</strong> $comentarios</p>";

        // 3. Validamos las contraseñas
        if ($contrasena === $repite_contrasena) {
            echo "<p><strong>Contraseña:</strong> La contraseña coincide.</p>";
        } else {
            echo "<p><strong>Contraseña:</strong> La contraseña no coincide.</p>";
        }
    } else {
        echo "<p>No se ha enviado ningún dato.</p>";
    }
    ?>
</body>
</html>