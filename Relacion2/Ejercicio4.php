<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $exponente = 2;
    $base = 9;
    
    function potencias($base,$exponente = 2){

        echo pow($base , $exponente);

    }

    potencias($base);
    
    
    ?>
</body>
</html>