<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    function factorial($numero) {
        // Lanza una excepción si el número es negativo
        if ($numero < 0) {
            throw new InvalidArgumentException("El número no puede ser negativo.");
        }

        // Caso base: el factorial de 0 es 1
        if ($numero === 0) {
            return 1;
        }

        // Cálculo del factorial de forma recursiva
        return $numero * factorial($numero - 1);
    }

    try {
        // Llamada a la función factorial con un valor de prueba
        echo factorial(5);  // Puedes cambiar este valor para probar
    } catch (InvalidArgumentException $e) {
        // Captura y muestra el mensaje de la excepción
        echo "Error: " . $e->getMessage();
    }

    ?>
</body>
</html>
