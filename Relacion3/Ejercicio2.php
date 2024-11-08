<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $array = [];

    for ($i = 0; $i <= 120; $i++) {

        $array[$i] = rand(0, 9);
    }

    mostrarArray($array);


    function mostrarArray($array)
    {
        foreach ($array as $numero) {
            echo $numero;
        }
    }


    ?>
</body>

</html>