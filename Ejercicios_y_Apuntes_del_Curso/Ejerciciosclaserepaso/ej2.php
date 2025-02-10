<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $frutas = array('manzana', 'naranja', 'pera', 'platano');
    echo '<br>' ;
    echo '<br>' .print_r($frutas);
    array_push($frutas ,'melocoton');
    array_push($frutas ,'albaricoque');
    echo '<br>' ;
    echo '<br>' .print_r($frutas);
    echo '<br>' . "Sacamos el ultimo ";
    echo array_pop($frutas);
    echo '<br>' ;
    echo '<br>' .print_r($frutas);
    //volteamos
    echo "Le damos la vuelta";
    array_reverse($frutas);
    //mostramos en el orden original
    echo '<br>' ;
    echo '<br>' .print_r($frutas);
    
    ?>
</body>
</html>