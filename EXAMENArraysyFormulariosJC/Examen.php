<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $usuarios[] = [

        'Daniel' => [
            'contraseña' => '123',
            'nombre' => 'Daniel ',
            'apellido1' => 'osuna',
            'apellido2' => 'molero',
            'edad' => '22',
            'fecha alta' => '2002/07/13',
        ],
        'Ana' => [
            'contraseña' => '123',
            'nombre' => 'Ana ',
            'apellido1' => 'quero',
            'apellido2' => 'de la rosa',
            'edad' => '20',
            'fecha alta' => '2005/07/13',
        ],
        'Pepe' => [
            'contraseña' => '123',
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
            'Titulo' => 'La rosa rosa',
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


    $prestamos[] = [
        'prestamo1' => [
            'ISBN' => '9999999999999',
            'Usuario' => 'Ana',
            'Fecha Inicio' => '18/11/2024',
            'Fecha Fin' => '18/12/2024',
        ],
        'prestamo2' => [
            'ISBN' => '1111111111111',
            'Usuario' => 'Pepe',
            'Fecha Inicio' => '11/01/2022',
            'Fecha Fin' => '11/02/2022',
        ],
        'prestamo3' => [
            'ISBN' => '8181818181811',
            'Usuario' => 'Daniel',
            'Fecha Inicio' => '11/07/2023',
            'Fecha Fin' => '11/08/2023',
        ]
    ];

    
    ?>
</body>
</html>