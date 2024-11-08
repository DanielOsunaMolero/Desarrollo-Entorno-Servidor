<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    function esPrimo ($numero){

        $resultado = 1;
        for($i = 1; $i <= $numero; $i++){

            if($i != 1 && $i != $numero && $numero % $i == 0){
                $resultado = $i;
                echo "es divisible por " . $i;
                return " no es primo ";
            }


        }
        if($resultado ==1){
            return "es primo";
        }

    }
    
    echo esPrimo(99);
    ?>
</body>
</html>