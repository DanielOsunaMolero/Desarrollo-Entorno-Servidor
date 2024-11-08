<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Rotation</title>
</head>
<body>
    <?php
   
    $numeros = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
    $tamanio = count($numeros); 

  
    echo "Original array:<br>";
    foreach ($numeros as $numero) {
        echo " " . $numero;
    }

    
    $ultimoElemento = $numeros[$tamanio - 1];

    
    for ($i = $tamanio - 1; $i > 0; $i--) {
        $numeros[$i] = $numeros[$i - 1];
    }

   
    $numeros[0] = $ultimoElemento;

   
    echo "<br><br>Rotated array by one position:<br>";
    foreach ($numeros as $numero) {
        echo " " . $numero;
    }
    ?>
</body>
</html>
