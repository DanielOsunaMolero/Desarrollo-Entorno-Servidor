<html>
<!-- //1. -->
<!-- <form method="POST" action="">
    <label for="longitud">Introduce la cadena 1: </label>
    <input type="string" id="cadena1" name="cadena1" min="10" max="1000">
    <br>
    <label for="longitud">Introduce la cadena 2: </label>
    <input type="string" id="cadena2" name="cadena2" min="10" max="1000">
    <input type="submit" value="Mostrar línea">
</form> -->

<!-- 2. -->

<!-- <form method="POST" action="">
    <label for="longitud">Introduce la cadena 1 para convertirla en minuscula: </label>
    <input type="string" id="cadena1" name="cadena1" min="10" max="1000">
    <input type="submit" value="Mostrar línea">
</form> -->

<!-- 3. -->

<!-- <form method="POST" action="">
    <label for="longitud">Introduce la cadena 1 para convertirla en mayuscula: </label>
    <input type="string" id="cadena1" name="cadena1" min="10" max="1000">
    <input type="submit" value="Mostrar línea">
</form> -->

<!-- 4. -->     

<!-- <form method="POST" action="">
    <label for="frase">Introduce la frase: </label>
    <input type="string" id="frase" name="frase" min="10" max="1000">
    <br>
    <label for="cadena">Introduce la cadena que deseas que se busque: </label>
    <input type="string" id="cadena" name="cadena" min="10" max="1000">
    <input type="submit" value="Mostrar línea">
</form> -->

<!-- 5. -->

<form method="POST" action="">
    <label for="frase">Introduce la frase: </label>
    <input type="string" id="frase" name="frase" min="10" max="1000">
    <br>
    <label for="cadena">Introduce la cadena que deseas que se busque: </label>
    <input type="string" id="cadena" name="cadena" min="10" max="1000">
    <input type="submit" value="Mostrar línea">
</form>


<?php
// 1. Crea un formulario que permita ingresar dos palabras. Usa la función strcmp() 
// para comparar ambas cadenas. Si las cadenas son iguales, muestra un mensaje que diga 
// "Las cadenas son iguales". Si no lo son, indica cuál es mayor en el orden lexicográfico.


// if (isset($_POST['cadena1']) && !is_null($_POST['cadena1'])) {
//     $cadena1 = (string)$_POST['cadena1'];
// }

// if (isset($_POST['cadena2']) && !is_null($_POST['cadena2'])) {
//     $cadena2 = (string)$_POST['cadena2'];
// }

// $resultado = strcmp($cadena1, $cadena2);
// if ($resultado == 0) {
//     echo "La cadenas son iguales";
// } else if ($resultado < 0) {
//     echo "La primera tiene mas valor lexicografico";
// } else {
//     echo "La segunda tiene mas valor lexicografico";
// }

// 2. Solicita al usuario que ingrese una frase y convierte toda la cadena a minúsculas 
// usando strtolower(). Muestra el resultado al usuario.

// if (isset($_POST['cadena1']) && !is_null($_POST['cadena1'])) {
//          $cadena1 = (string)$_POST['cadena1'];
//      }

//      $cadenaminuscula = strtolower($cadena1);

//      echo $cadenaminuscula;

// 3. Solicita al usuario que ingrese una frase y convierte toda la 
// cadena a mayúsculas usando strtoupper(). Muestra el resultado al usuario.

// if (isset($_POST['cadena1']) && !is_null($_POST['cadena1'])) {
//     $cadena1 = (string)$_POST['cadena1'];
// }

// $cadenamayuscula = strtoupper($cadena1);

// echo $cadenamayuscula;

// 4. Pide al usuario que ingrese una frase y una palabra, luego usa strpos() 
// para determinar si la palabra está presente en la frase. Si la palabra está, 
// indica en qué posición empieza; si no, muestra un mensaje de error. 
// Resuélvelo ahora usando la función str_contains().

// if (isset($_POST['frase']) && !is_null($_POST['frase'])) {
//     $frase = (string)$_POST['frase'];
// }
// if (isset($_POST['cadena']) && !is_null($_POST['cadena'])) {
//     $cadena = (string)$_POST['cadena'];
// }

// if(str_contains($frase,$cadena)== true){
//     echo"La palabra si se encuentra en la frase";

//     $posicion = strpos($frase,$cadena);
//     echo " <br> Posicion: " .$posicion;

// }else{
//     echo"La palabra no se encuentra en la frase";
// }

// 5. Pide al usuario que ingrese una frase y una palabra. Usa 
// str_starts_with() para verificar si la frase empieza con la 
// palabra ingresada. Muestra un mensaje indicativo. Comprueba 
// usando el método str_ends_with() si la frase termina con una 
// determinada palabra. Igual que antes, muestra un mensaje indicativo. 


if (isset($_POST['frase']) && !is_null($_POST['frase'])) {
    $frase = (string)$_POST['frase'];
}
if (isset($_POST['cadena']) && !is_null($_POST['cadena'])) {
    $cadena = (string)$_POST['cadena'];
}

if(str_starts_with($frase,$cadena) == true){
    echo "La frase empieza por la cadena determinada";
}else{
    echo"La frase no empieza por la palabra proporcionada";
}
if(str_ends_with($frase,$cadena) == true){
    echo " <br> La frase acaba por la palabra " . $cadena;
}else{
    echo" <br> La frase no acaba por la palabra proporcionada";
}
?>

</html>