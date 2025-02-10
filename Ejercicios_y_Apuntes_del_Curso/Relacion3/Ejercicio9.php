<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
        $provincias = ["Almeria" , "Granada","Cordoba","Jaen","Malaga","Cadiz","Sevilla","Huelva"];

        echo "Antes de borrar el indice 2 :";
        echo"<br>";
        mostrarArray($provincias);
        echo"<br>";
        unset($provincias[2]);
        echo"<br>";
        echo "Despues de borrar el indice 2 :";
        echo"<br>";
        mostrarArray($provincias);

        function mostrarArray($provincias){
            foreach($provincias as $provincia){
                echo $provincia . "  |";
            }
            
        }
    
    ?>
</body>
</html>