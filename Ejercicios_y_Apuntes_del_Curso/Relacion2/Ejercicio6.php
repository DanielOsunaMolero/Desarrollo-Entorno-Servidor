<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    function mcd($num1, $num2) {
        $resultado = 1; // Empezamos con 1, ya que siempre es un divisor común

        // Recorremos desde 1 hasta el menor de $num1 y $num2
        for ($i = 1; $i <= min($num1, $num2); $i++) {
            if ($num1 % $i == 0 && $num2 % $i == 0) {
                $resultado = $i;
            }
        }
        
        return $resultado; // Retornamos el mayor divisor común
    }

    echo mcd(4, 8);
?>

</body>
</html>