<html>
    <?php
        $a = 2;
        $b = 5;
        $c = 6;

        // Cálculo del dentro
        $dentro = pow($b, 2) - (4 * $a * $c);

        if ($dentro < 0) {
            echo "No hay soluciones reales, el dentro es negativo.";
        } else {
            
            $ecuacions1 = (-$b + sqrt($dentro)) / (2 * $a);
            $ecuacions2 = (-$b - sqrt($dentro)) / (2 * $a);

          
            echo "Solución 1: " . round($ecuacions1, 2);
            echo "<br>Solución 2: " . round($ecuacions2, 2);

      
            printf("<br>Solución 1 (formateado con 2 decimales): %.2f<br>", $ecuacions1);
            printf("Solución 2 (formateado con 2 decimales): %.2f<br>", $ecuacions2);
        }
    ?>
</html>