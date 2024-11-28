<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<form method="POST" action="">
    <label for="dia">Introduce un dia</label>
    <input type="number" id="dia" name="dia" required>
    <br>
    <label for="mes">Introduce un mes:</label>
    <input type="number" id="mes" name="mes" required>
    <input type="submit" value="Enviar">
</form>

<body>
<?php
function obtenerHoroscopo($dia, $mes) {
    return match (true) {
        ($mes == 1 && $dia >= 20) || ($mes == 2 && $dia <= 18) => "Acuario",
        ($mes == 2 && $dia >= 19) || ($mes == 3 && $dia <= 20) => "Piscis",
        ($mes == 3 && $dia >= 21) || ($mes == 4 && $dia <= 19) => "Aries",
        ($mes == 4 && $dia >= 20) || ($mes == 5 && $dia <= 20) => "Tauro",
        ($mes == 5 && $dia >= 21) || ($mes == 6 && $dia <= 20) => "Géminis",
        ($mes == 6 && $dia >= 21) || ($mes == 7 && $dia <= 22) => "Cáncer",
        ($mes == 7 && $dia >= 23) || ($mes == 8 && $dia <= 22) => "Leo",
        ($mes == 8 && $dia >= 23) || ($mes == 9 && $dia <= 22) => "Virgo",
        ($mes == 9 && $dia >= 23) || ($mes == 10 && $dia <= 22) => "Libra",
        ($mes == 10 && $dia >= 23) || ($mes == 11 && $dia <= 21) => "Escorpio",
        ($mes == 11 && $dia >= 22) || ($mes == 12 && $dia <= 21) => "Sagitario",
        ($mes == 12 && $dia >= 22) || ($mes == 1 && $dia <= 19) => "Capricornio",
        default => "Fecha no válida",
    };
}

// Ejemplo de uso
$dia = $_REQUEST["dia"];
$mes = $_REQUEST["mes"];
echo "El signo zodiacal para la fecha $dia/$mes es: " . obtenerHoroscopo($dia, $mes);
?>
</body>
</html>