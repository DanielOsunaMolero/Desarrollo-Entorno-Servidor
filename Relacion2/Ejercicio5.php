<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        date_default_timezone_set('Europe/Madrid');
        function fechaHoyEnCastellano() {
        // Establecer la configuración regional a español
        setlocale(LC_TIME, 'es_ES.UTF-8', 'spanish');
        
        // Obtener la fecha actual formateada
        $fechaHoy = strftime("%A, %d de %B de %Y");
        
        // Mostrar la fecha
        return ucfirst($fechaHoy); // Capitalizar la primera letra
    }
    
    // Imprimir la fecha de hoy en castellano
    echo fechaHoyEnCastellano();

    ?>
</body>
</html>