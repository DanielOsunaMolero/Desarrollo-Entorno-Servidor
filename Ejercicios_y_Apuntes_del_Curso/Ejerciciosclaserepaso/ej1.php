<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     $numeros =array(1,2,3,4,5,6,7);
     if(in_array(7,$numeros)){
        echo "Esta el numero en el array";
     }else{
        echo "No esta el numero en el array";
     }
    $longitudarray = count($numeros);
    echo "<br>El array tiene " . $longitudarray . " de longitud";
    

    $frutas = array('manzana', 'naranja', 'pera', 'platano');

    
    sort($frutas);
    echo "<br>Frutas ordenadas: ";
    print_r($frutas); // Correct way to display an array

    // Remove 'naranja' from the array
    unset($frutas[array_search('naranja', $frutas)]);

    // Sort and display the fruits again
    sort($frutas); // Sort the array again after removing 'naranja'
    echo "<br>Frutas después de eliminar 'naranja' y reordenar: ";
    print_r($frutas); // Display the sorted array again

    ?>
</body>
</html>