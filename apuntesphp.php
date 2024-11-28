<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    //definir variable
    $pais = "españa";
    $habitantes = 90000;
    $continente =  "europa";

    //sacar por pantalla

    echo "valor : ". $pais ."  Tipo: ". gettype($pais);
        echo "<br> valor : ". $habitantes ."  Tipo: ". gettype($habitantes);
        echo "<br> valor : ". $continente ."  Tipo: ". gettype($continente);

    //funciones matematicas
    //pow(base , exponente) para elevar    
    //round para redondear round(,)
    
    $_SERVER["REQUEST_METHOD"] == "POST"; //  sirve para saber en que metodo ha sido mandado el request de la pagina
                                        // el post se usa para los mas confidenciales , es decir formularios , inicios de sesion
    $_SERVER["REQUEST_METHOD"] == "GET";// el get se usa para cuando los datos no son sensibles como pueden ser consultas simples(los datos aparecen en la URL)

    $_POST; //se usa para acceder a los datos del formulario EJEMPLO : $_POST["nombre"] (cuando el id sea nombre obviamente)
    /*
    strtotime(); Es un metodo que sirve para el tiempo en dias , mes , año
    Convierte una descripcion de fecha y hora en una marca de tiempo que es el numero de segundos desde el 1 de enero de 1970
    Se usa para pasar todo a la misma unidad y poder realizar calculos con fechas o comparaciones de tiempo

    $datetime --> representa fecha/hora y puede ser en varios formatos como puedens ser :"now", "next Monday", "2024-11-25"
    un enmplo de uso puede ser: 
    */
    $fecha = strtotime("2024-11-25");
    // echo date(formato, datos)
    echo date("d-m-y", $fecha);

    //definir un array
    $array[] = ""; //array vacio
    $array1[] =[1,2,3,4];

    //in_array(); //sirve para buscar en un array 
    //EJEMPLO :
    $frutas = ["manzana", "naranja", "plátano", "uva"];

    // Verificar si "naranja" está en el array
    if (in_array("naranja", $frutas)) {
        echo "¡Encontrado!";
    } else {
        echo "No se encontró.";
    }

    //is_string --> comprueba si es una cadena de caracteres.
    //is_numeric --> comprueba si es un numero.
    //is_array --> comprueba si es un array
    //strtoupper($argumento) --> pasa a mayusculas
    //strtolower($argumento) --> pasa a minuscula
    //strlen() --> longitud de una cadena
    //strcomp --> se usa para la comparacion de dos cadenas sensible a mayusculas y minusculas . Las compara de forma binaria
    // 0 si son exactamente iguales , -1 si st1 es menor que str2 , 1 si str1 es mayor que str2
    // strcasecmp() si no queremos diferenciar entre mayusculas y minusculas
    //rand(rango1,rango2) --> generar numero aleatorio

    //pregmatch para expresiones regulares
    /* definicion de un array como el profesor quiere+
    $productos = [
        ["nombre" => "Televisor", "precio" => 400, "stock" => 10],
        ["nombre" => "Televisor Sony", "precio" => 350, "stock" => 15],
        ["nombre" => "Televisor Xiaomi", "precio" => 475, "stock" => 25],
        ["nombre" => "Portátil", "precio" => 800, "stock" => 5],
        ["nombre" => "Smartphone", "precio" => 300, "stock" => 20],
    ];

    se accede con $productos["nombre"]
                  $productos["precio"]
    */










    //FUNCIONES PARA USAR DIRECTAMENTE

    //DARLE LA VUELTA A UNA CADENA
    function darlavuelta($cadena){
        $longitud = strlen($cadena);
        for($i = $longitud - 1; $i >= 0; $i--) {
            echo $cadena[$i];
        }
        
    }

    function mostrarArray($array){
        foreach($array as $posicion){
            echo $posicion;
        }
    }

    function login($usu, $pw)
    {
        global $usuarios;
        if (empty($pw)) {
            throw new Exception("ERROR DEL SISTEMA: La contraseña no puede estar vacía.");
        }

        if (comprobar_contraseña($pw)== true) {
            return isset($usuarios[$usu]) && $usuarios[$usu]['contraseña'] === $pw;

            
        }

        
    }


    function comprobar_contraseña($contraseña) {

        // Comprobando si está dentro de los límites permitidos
        if (strlen($contraseña) < 6 || strlen($contraseña) > 15) {
            echo "La contraseña debe tener entre 6 y 15 caracteres.\n";
            return false;
        }

        // Inicializamos los indicadores para las condiciones
        $tieneNumero = false;
        $tieneMayuscula = false;
        $tieneMinuscula = false;
        $tieneCaracterEspecial = false;

        // Recorremos cada carácter de la cadena
        for ($i = 0; $i < strlen($contraseña); $i++) {
            $letra = $contraseña[$i];

            // Comprobamos si es un número
            if (is_numeric($letra)) {
                $tieneNumero = true;
            }

            // Comprobamos si es una letra mayúscula
            if (ctype_upper($letra)) {
                $tieneMayuscula = true;
            }

            // Comprobamos si es una letra minúscula
            if (ctype_lower($letra)) {
                $tieneMinuscula = true;
            }

            // Comprobamos si es un carácter no alfanumérico
            if (!ctype_alnum($letra)) {
                $tieneCaracterEspecial = true;
            }
        }

   
        if (!$tieneNumero) {
            echo "La contraseña debe tener al menos un número.\n";
            return false;
        }
        if (!$tieneMayuscula) {
            echo "La contraseña debe tener al menos una letra mayúscula.\n";
            return false;
        }
        if (!$tieneMinuscula) {
            echo "La contraseña debe tener al menos una letra minúscula.\n";
            return false;
        }
        if (!$tieneCaracterEspecial) {
            echo "La contraseña debe tener al menos un carácter especial.\n";
            return false;
        }


        echo "La contraseña es válida.\n";
        return true;
    }
    ?>
</body>
</html>