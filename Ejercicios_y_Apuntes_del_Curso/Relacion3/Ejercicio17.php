<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    $productos = [
        ["nombre" => "Televisor", "precio" => 400, "stock" => 10],
        ["nombre" => "Televisor Sony", "precio" => 350, "stock" => 15],
        ["nombre" => "Televisor Xiaomi", "precio" => 475, "stock" => 25],
        ["nombre" => "Portátil", "precio" => 800, "stock" => 5],
        ["nombre" => "Smartphone", "precio" => 300, "stock" => 20],
    ];
    
    // Mostrar el array original
    echo "<h3>Array original:</h3>";
    mostrarArray($productos);

    // Ordenar el array con usort
    usort($productos, function($a, $b) {
        $nombreComparacion = strcmp($a["nombre"], $b["nombre"]);
        if ($nombreComparacion === 0) {
            return $a['stock'] - $b['stock'];
        }
        return $nombreComparacion;
    });

    // Mostrar el array ordenado
    echo '<h3>Array ordenado:</h3>';
    mostrarArray($productos);

    // Buscar si existe un producto con nombre "Televisor"
    $nombres = array_column($productos, "nombre");
    if (in_array("Televisor", $nombres)) {
        echo "<p>El producto 'Televisor' está en la lista.</p>";
    } else {
        echo "<p>El producto 'Televisor' no está en la lista.</p>";
    }

    // Función para mostrar el contenido de un array
    function mostrarArray($array)
    {
        // Verificar si el argumento es un array
        if (is_array($array)) {
            foreach ($array as $item) {
                // Si el elemento es un array, lo imprimimos con print_r para mejor legibilidad
                if (is_array($item)) {
                    echo "<pre>";
                    print_r($item);
                    echo "</pre>";
                } else {
                    echo $item . " ";
                }
            }
            echo "<br>"; // Salto de línea al final para mayor claridad
        } else {
            echo "El argumento proporcionado no es un array.<br>";
        }
    }
    
    ?>
</body>
</html>
