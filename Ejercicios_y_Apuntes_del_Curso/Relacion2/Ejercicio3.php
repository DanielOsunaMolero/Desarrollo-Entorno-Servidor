<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$argumento = "UN SALUDO";

function comprobar($argumento) {
 
    if (is_string($argumento)) {

        if ($argumento == "") {
            echo "Este es el relleno porque estaba vacía";
        } else {
            // Convertir a mayúsculas y mostrar el argumento
            echo strtoupper($argumento);
        }
    } else {
       
        echo $argumento . " no es una cadena de caracteres";
    }
}

comprobar($argumento);

?>

</body>
</html>