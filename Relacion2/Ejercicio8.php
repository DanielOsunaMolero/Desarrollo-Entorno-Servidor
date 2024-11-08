<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
function esConsonante($letra) {
    // Comprobar si la letra es una consonante válida
    $consonantes = "BCDFGHJKLMNPRSTVWXYZ";
    return strpos($consonantes, $letra) !== false;
}

function validar_matricula($cadena) {
    // Comprobar que la cadena tenga exactamente 7 caracteres
        if (strlen($cadena) != 7) {
            echo "La cadena $cadena NO vale como matrícula";
            return;
        }
    
    // Comprobar que los primeros 4 caracteres sean números
        for ($i = 0; $i < 4; $i++) {
            if (!is_numeric($cadena[$i])) {
                echo "La cadena $cadena NO vale como matrícula";
                return;
            }
        }
    
    // Comprobar que los últimos 3 caracteres sean consonantes mayúsculas
        for ($i = 4; $i < 7; $i++) {
            if (!esConsonante($cadena[$i])) {
                echo "La cadena $cadena NO vale como matrícula";
                return;
            }
        }

        // Si pasa todas las comprobaciones, es una matrícula válida
        echo "La cadena $cadena vale como matrícula";
    }

    // Ejemplos
    validar_matricula("1234PRS"); // Válido
    echo "<br>";
    validar_matricula("12345RS"); // No válido
?>

</body>
</html>