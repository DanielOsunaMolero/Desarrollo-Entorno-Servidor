<html>
    <form method="post" action="">
        <label for="numero">Introduce un numero: </label>
        <input type="text" id="numero" name="numero">
        <input type="submit" value="Enviar">
    </form>

<?php
    // Inicializamos la variable de presupuesto
    $presupuesto = 0;

    
    if (isset($_POST['numero']) && !is_null($_POST['numero'])) {
       
        $numero = (int)htmlspecialchars($_POST['numero']);

        // Función para modificar las presupuesto
        function retocar_presupuesto($numero) {
           
            global $presupuesto;

            if ($numero > 0) {
                
                $presupuesto += $numero;
            } else {
                
                $presupuesto += $numero; 
            }

            return $presupuesto; 
        }

        
        echo "El presupuesto anterior era: $presupuesto<br>";

       
        $nuevoPresupuesto = retocar_presupuesto($numero);

        // Mostramos el nuevo presupuesto
        echo "El nuevo presupuesto es: $nuevoPresupuesto";
    }
?>
</html>
