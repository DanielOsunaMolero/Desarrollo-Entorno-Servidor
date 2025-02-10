<html>

<form method="POST" action="">
    <label for="radio">Introduce un número:</label>
    <input type="number" id="radio" name="radio" required>
    <input type="submit" value="Enviar">
</form>

    <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $radio = $_POST["radio"];
        }
        $longitud = 2*$radio*pi();
        $superficie = pi()*pow($radio,2);
        $volumen = (4/3)*(pi()*pow($radio,3));


        echo "<br>Con round() y echo:<br>";
        echo "Longitud (redondeado a 2 decimales): " . round($longitud, 2) . "<br>";
        echo "Superficie (redondeado a 2 decimales): " . round($superficie, 2) . "<br>";
        echo "Volumen (redondeado a 2 decimales): " . round($volumen, 2) . "<br>";
        
        // Con printf()
        echo "<br>Con printf():<br>";
        printf("Longitud (formateado con 2 decimales): %.2f<br>", $longitud);
        printf("Superficie (formateado con 2 decimales): %.2f<br>", $superficie);
        printf("Volumen (formateado con 2 decimales): %.2f<br>", $volumen);

    ?>

</html>