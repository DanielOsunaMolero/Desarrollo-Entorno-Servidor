<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    function comprobar_contraseña($contraseña) {

        // Comprobando si está dentro de los límites permitidos
        if (strlen($contraseña) < 6 || strlen($contraseña) > 15) {
            echo "La contraseña debe tener entre 6 y 15 caracteres.\n";
            return false;
        }

        // Inicializamos los indicadores para las condiciones
        $tieneNumero = false;
        $tieneMayuscula = false;
        $tieneMinuscula = false;
        $tieneCaracterEspecial = false;

        // Recorremos cada carácter de la cadena
        for ($i = 0; $i < strlen($contraseña); $i++) {
            $letra = $contraseña[$i];

            // Comprobamos si es un número
            if (is_numeric($letra)) {
                $tieneNumero = true;
            }

            // Comprobamos si es una letra mayúscula
            if (ctype_upper($letra)) {
                $tieneMayuscula = true;
            }

            // Comprobamos si es una letra minúscula
            if (ctype_lower($letra)) {
                $tieneMinuscula = true;
            }

            // Comprobamos si es un carácter no alfanumérico
            if (!ctype_alnum($letra)) {
                $tieneCaracterEspecial = true;
            }
        }

   
        if (!$tieneNumero) {
            echo "La contraseña debe tener al menos un número.\n";
            return false;
        }
        if (!$tieneMayuscula) {
            echo "La contraseña debe tener al menos una letra mayúscula.\n";
            return false;
        }
        if (!$tieneMinuscula) {
            echo "La contraseña debe tener al menos una letra minúscula.\n";
            return false;
        }
        if (!$tieneCaracterEspecial) {
            echo "La contraseña debe tener al menos un carácter especial.\n";
            return false;
        }


        echo "La contraseña es válida.\n";
        return true;
    }


    $contraseña = "MiContrass1~~";
    comprobar_contraseña($contraseña);

    ?>

</body>
</html>