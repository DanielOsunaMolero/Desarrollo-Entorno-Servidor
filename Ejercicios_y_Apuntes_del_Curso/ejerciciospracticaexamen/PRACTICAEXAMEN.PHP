<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="">
        <label for="name">Introduce el nombre:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="password">Introduce la contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    // Array de profesores para ejemplo
    

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $_POST["name"] ?? "";
        $password = $_POST["password"] ?? "";

        try {
            if (login($name, $password)) {
                echo "<p>Inicio de sesión exitoso. Bienvenido, $name.</p>";
            } else {
                echo "<p>Error: Usuario o contraseña incorrectos.</p>";
            }
        } catch (Exception $e) {
            echo "<p>Error: " . $e->getMessage() . "</p>";
        }
    }

    function login($usu, $pw) {
        global $profesores;

        // Verificar si la contraseña está vacía
        if (strlen($pw) === 0) {
            throw new Exception("ERROR DEL SISTEMA: La contraseña no puede estar vacía.");
        }

        // Verificar la validez de la contraseña
        comprobar_contraseña($pw);

        // Verificar si el usuario y la contraseña coinciden
        return isset($profesores[$usu]) && $profesores[$usu]['contraseña'] === $pw;
    }

    function comprobar_contraseña($contraseña) {
        // Comprobar longitud de la contraseña
        if (strlen($contraseña) < 6 || strlen($contraseña) > 15) {
            throw new Exception("La contraseña debe tener entre 6 y 15 caracteres.");
        }

        // Inicializamos los indicadores para las condiciones
        $tieneNumero = false;
        $tieneMayuscula = false;
        $tieneMinuscula = false;
        $tieneCaracterEspecial = false;

        // Recorremos cada carácter de la cadena
        for ($i = 0; $i < strlen($contraseña); $i++) {
            $letra = $contraseña[$i];

            if (ctype_digit($letra)) {
                $tieneNumero = true;
            }

            if (ctype_upper($letra)) {
                $tieneMayuscula = true;
            }

            if (ctype_lower($letra)) {
                $tieneMinuscula = true;
            }

            if (!ctype_alnum($letra)) {
                $tieneCaracterEspecial = true;
            }
        }

        // Comprobar todas las condiciones
        if (!$tieneNumero) {
            throw new Exception("La contraseña debe tener al menos un número.");
        }
        if (!$tieneMayuscula) {
            throw new Exception("La contraseña debe tener al menos una letra mayúscula.");
        }
        if (!$tieneMinuscula) {
            throw new Exception("La contraseña debe tener al menos una letra minúscula.");
        }
        if (!$tieneCaracterEspecial) {
            throw new Exception("La contraseña debe tener al menos un carácter especial.");
        }
    }
    ?>
</body>
</html>
