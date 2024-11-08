<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $array= [] ;
    for ($i = 0; $i <= 15; $i++) {

        $array[$i] = rand(0, 1);
    }
    $array2= [] ;

    for ($i=0; $i < count($array) ; $i++) { 
        if($array[$i]== 1){
            $array2[$i] = 0;
        }else{
            $array2[$i] =1;
        }
    }
    
    mostrarArray($array);

    echo "<br>";
    mostrarArray($array2);
    

    function mostrarArray($array){
        foreach($array as $numero){
            echo $numero;
        }
        
    }
    ?>
</body>
</html>