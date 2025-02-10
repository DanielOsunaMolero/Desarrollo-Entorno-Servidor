<html>

<body>

    <!-- <form method="post" action="">
        <label for="numero">Introduce un numero: </label>
        <input type="text" id="numero" name="numero">
        <input type="submit" value="Enviar">
    </form>
    <form method="post" action="/index.php">
        <input type="submit" value="Menu">
    </form> -->


    <?php
    // $numero = null;
    // if (isset($_POST['numero']) && !is_null($_POST['numero'])) {
    //     $numero = (int)htmlspecialchars($_POST['numero']);
    // }
    // $numerosecreto = 7;



    // if ($numero == $numerosecreto && !is_null($_POST['numero'])) {

    //     echo "Has acertado el numero : ";
    //     for ($i = 0; $i < 8; $i++) {
    //         echo $i . "<br> ";
    //     }
    // }

    $valor1 = 10;
    function operacion_uno($valor2)
    {
        global $valor1;
        return $valor1 + $valor2;
    }

    function operacion_dos($valor2)
    {
        global $valor1;
        return $valor1 - $valor2;
    }

    $numero = "uno";
    $op = "operacion_" . $numero;
    echo "<br> Ahora sumo dos números usando Funciones variables: " . $op(5); //Imprime 15

    $op = "";
    $numero = "dos";
    $op = "operacion_" . $numero;
    echo "<br> Ahora resto dos números usando Funciones variables: " . $op(2); //Imprime 8 

    $operacion_uno = fn($valor2) => $valor1 + $valor2;
    $operacion_dos = fn($valor2) => $valor1 - $valor2;

    $numero = "uno";
    $op = "operacion_" . $numero;
    echo "<br> Ahora sumo dos números usando Funciones variables: " . $$op(5); // Imprime 12

    $op = "";
    $numero = "dos";
    $op = "operacion_" . $numero;
    echo "<br> Ahora resto dos números usando Funciones variables: " . $$op(2); // Imprime 8
    ?>
</body>

</html>