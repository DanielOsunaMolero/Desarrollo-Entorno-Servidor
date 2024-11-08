<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    for ($i = 0; $i <= 10; $i++) {

        $array[$i] = rand(0, 9);
    }

    $arraycuadrados= [];
    $arraycubos= [];
    for ($i=0; $i < count($array) ; $i++) { 
        $arraycuadrados[$i]= pow($array[$i],2);

    }
    for ($i=0; $i < count($array) ; $i++) { 
        $arraycubos[$i]= pow($array[$i],3);

    }
    mostrarArray($array);
    echo "<br>";
    mostrarArray($arraycuadrados);
    echo "<br>";
    mostrarArray($arraycubos);

    function mostrarArray($array){
        foreach($array as $numero){
            echo $numero . "  |";
        }
        
    }
    ?>
</body>
</html>