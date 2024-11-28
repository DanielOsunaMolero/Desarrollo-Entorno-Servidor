<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
</head>

<body>
    <?php

    $usuarios = [

        'Daniel' => [
            'pw' => '123',
            'nombre' => 'Daniel ',
            'apellido1' => 'osuna',
            'apellido2' => 'molero',
            'edad' => '22',
            'fecha alta' => '2002/07/13',
        ],
        'Ana' => [
            'pw' => '123',
            'nombre' => 'Ana ',
            'apellido1' => 'quero',
            'apellido2' => 'de la rosa',
            'edad' => '20',
            'fecha alta' => '2005/07/13',
        ],
        'Pepe' => [
            'pw' => '123',
            'nombre' => 'Pepe ',
            'apellido1' => 'Pelegrini',
            'apellido2' => 'Ramos',
            'edad' => '30',
            'fecha alta' => '1997/06/01',
        ],
    ];


    $libros[] = [
        '1233456789101' => [
            'NºUnidades' => '10',
            'Titulo' => 'El espejo encantaodo',
            'Editorial' => 'Planeta',
            'Año de Edicion' => '1991',
            'Autores' => [
                'Nombre' => 'Manuel',
                'Apellido1' => 'Lopez',
                'Apellido2' => 'Galan',
            ],
        ],
        '9999999999999' => [
            'NºUnidades' => '90',
            'Titulo' => "La rosa rosa",
            'Editorial' => 'Mundolibros',
            'Año de Edicion' => '2020',
            'Autores' => [
                'Nombre' => 'Francisco',
                'Apellido1' => 'Medina',
                'Apellido2' => 'Perez',
            ],
        ],
        '8181818181811' => [
            'NºUnidades' => '70',
            'Titulo' => 'El señor de los anillos',
            'Editorial' => 'Desconocida',
            'Año de Edicion' => '1950',
            'Autores' => [
                'Nombre' => 'Tolkien',
                'Apellido1' => 'Jimenez',
                'Apellido2' => 'Montoya',
            ],
        ],
        '1111111111111' => [
            'NºUnidades' => '90',
            'Titulo' => 'El flautista de hamelin',
            'Editorial' => 'Planeta',
            'Año de Edicion' => '1800',
            'Autores' => [
                'Nombre' => 'Jose',
                'Apellido1' => 'Altimita',
                'Apellido2' => 'Molero',
            ],
        ],
    ];


    $prestamos = [
        [
            'ISBN' => '9999999999999',
            'Usuario' => 'Ana',
            'Fecha Inicio' => '18/11/2024',
            'Fecha Fin' => '18/12/2024',
        ],
        [
            'ISBN' => '1111111111111',
            'Usuario' => 'Pepe',
            'Fecha Inicio' => '11/01/2022',
            'Fecha Fin' => '11/02/2022',
        ],
        [
            'ISBN' => '8181818181811',
            'Usuario' => 'Daniel',
            'Fecha Inicio' => '11/07/2023',
            'Fecha Fin' => '11/08/2023',
        ]
    ];
    



    function login($usu, $pw)
    {
        global $usuarios;
        if (empty($pw)) {
            throw new Exception("ERROR DEL SISTEMA: La contraseña no puede estar vacía.");
        }
        return isset($usuarios[$usu]) && $usuarios[$usu]['pw'] === $pw;

    }

    function escribeUsuario($usu)
    {
        global $usuarios;

        if (isset($usuarios[$usu])) { //si esta definida
            $datosUsuario = $usuarios[$usu]; //pasamos el array de datos de usu a una variable

            //mostramos los datos
            echo $datosUsuario["apellido1"] . " " . $datosUsuario["apellido2"] . ", " . $datosUsuario["nombre"];
            echo " (" . $datosUsuario["edad"] . ")<br>";
            echo "Está con nosotros desde el " . $datosUsuario['fecha alta'] . ".";
        } else {
            echo "ERROR DEL SISTEMA DE PRECONDICIÓN: Usuario no encontrado.";
        }
    }



    function escribePrestamos($usu)
    {
        global $prestamos;
        global $usuarios;
        global $libros;

        // Verificar si el usuario existe en el sistema
        if (!isset($usuarios[$usu])) {
            echo "ERROR DEL SISTEMA : El usuario no existe";
            return;
        }

        // Recuperar la contraseña del usuario para validar login
        $password = $usuarios[$usu]['pw'];

        if (login($usu, $password)) {
            echo "<table border='1'>";
            echo "<tr><th>ISBN</th><th>Título</th><th>Fecha de inicio</th><th>Fecha de Fin</th><th>Retrasado</th></tr>";

            foreach ($prestamos as $prestamo) {
                if ($prestamo['Usuario'] === $usu) {
                    $isbn = $prestamo['ISBN']; // Clave correcta con mayúsculas
                    $titulo = $libros[$isbn]['Titulo']; // Clave correcta con mayúscula inicial
                    $fechaInicio = date("d-m-Y", strtotime($prestamo['Fecha Inicio']));
                    $fechaFin = date("d-m-Y", strtotime($prestamo['Fecha Fin']));
                    $retrasado = (strtotime($prestamo['Fecha Fin']) < time()) ? 'SI' : 'NO';

                    echo "<tr><td>$isbn</td><td>$titulo</td><td>$fechaInicio</td><td>$fechaFin</td><td>$retrasado</td></tr>";
                }
            }

            echo "</table>";
        } else {
            echo "ERROR DEL SISTEMA : El usuario no existe o la contraseña es incorrecta";
        }
    }



        //funcion para verificar si un libro esta disponible

        // function librodisponible($isbn){

        //     global $libros;
        //     if (isset($libros['isbn']) && $libros['isbn']['NºUnidades']> 1) {
        //         return true;
        //     }
        //         return false;
            
        
        // }
        // function registrarPrestamo($isbn, $usuario, $fechaInicio, $fechaFin) {
        //     global $prestamos, $libros;
        //     if (libroDisponible($isbn)) {
        //         $prestamos[] = [
        //             'isbn' => $isbn,
        //             'usuario' => $usuario,
        //             'fecha_inicio' => $fechaInicio,
        //             'fecha_fin' => $fechaFin,
        //         ];
        //         // Reducir unidades disponibles del libro
        //         $libros[$isbn]['unidades']--;
        //         return true;
        //     }
        //     return false;
        // }

        function listarLibrosDisponibles(){
            global $libros;
            $disponibles[] = '';

            foreach($libros as $libro => $datoslibro){

                if($datoslibro['NºUnidades'>0]){ //si es mayor que 0 esta disponible
                    $disponibles['isbn'] = $datoslibro;

                }
                return $disponibles;
            }
        }

        // function buscarLibro($isbn) {
        //     global $libros;
        //     if (isset($libros[$isbn])) {
        //         return $libros[$isbn];
        //     }
        //     throw new Exception("ERROR DEL SISTEMA: El libro no existe");
        // }

        //la funcion isset verifica si la clave isbn existe en el array libros y si el valor asociado no es null

        
    

    ?>

</body>

</html>