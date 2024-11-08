<!DOCTYPE html>
<html lang="en">
    
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9 uwu</title>
</head>
<body>
    <table border="2px">
        <legend >Tabla inglés-español</legend>
        <br>
        <?php

        $num_esp=array("uno","dos","tres","cuatro","cinco","seis","siete","ocho","nueve","diez");
        $num_eng=array("one","two","three","four","five","six","seven","eight","nine","ten");
        
        for($i= 0;$i<count($num_esp);$i++){
            echo("<tr>"."<td>".$num_esp[$i]."</td>"."<td>".$num_eng[$i]."</td>"."</tr>");


        }
           
        
        ?>


    </table>
    
</body>
</html>