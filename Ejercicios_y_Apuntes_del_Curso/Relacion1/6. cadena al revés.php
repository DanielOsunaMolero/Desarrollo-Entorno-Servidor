<html>
    <?php

        $cadena = "almendrado";
        $longitud = strlen($cadena);

        // Corregimos el bucle para empezar desde $longitud - 1
        for($i = $longitud - 1; $i >= 0; $i--) {
            echo $cadena[$i];
        }
    
    ?>
</html>
