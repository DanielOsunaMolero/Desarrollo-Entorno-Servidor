<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $array1= [1,1,7,4,7,6,7,8];

        mostrarArray($array1);

        sort($array1);

         echo "<br>";
        mostrarArray($array1);
        //mostrar longitud del array
        echo "<br> Tiene esta cantidad de numeros : " .count($array1);
        
        //buscar elemento dentro del array

        echo "<br>";
        echo "El primer 7 se encuentra en la posicion : ".array_search(7,$array1);
    

        function mostrarArray($array1){
            foreach($array1 as $numero){
                echo $numero;
            }
        }
    
        $buscar =$_GET ['valor'];
        if(in_array($buscar,$array1)){
            echo "<br>El numero buscado se encuentra";
        }else{
            echo "<br>El numero buscado se encuentra";
        }
    
    ?>
</body>
</html>