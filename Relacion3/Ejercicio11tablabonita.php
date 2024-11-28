<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Boletín de notas</title>
    <style>
        body {
            background-color: #87CEEB;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        table {
            margin: 20px auto;
            width: 50%;
            border-collapse: collapse;
            background-color: #ffffff;
        }
        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #333;
            color: #fff;
        }
        h2 {
            color: #333;
        }
    </style>
</head>
<body>

    <?php
        // Array asociativo con las asignaturas y sus notas por trimestre
        $notas = [
            "Matemáticas" => [3, 10, 7],
            "Lengua" => [5, 6, 5],
            "Física" => [7, 4, 3],
            "Latín" => [6, 6, 5],
            "Inglés" => [6, 2, 3]
        ];

        // Función para calcular la media de una asignatura
        function calcularMedia($notas) {
            return array_sum($notas) / count($notas);
        }

        // Calcular las medias de cada asignatura y la media total
        $medias = [];
        $totalMedia = 0;
        foreach ($notas as $asignatura => $notasTrimestres) {
            $mediaAsignatura = calcularMedia($notasTrimestres);
            $medias[$asignatura] = $mediaAsignatura;
            $totalMedia += $mediaAsignatura;
        }
        $mediaTotal = $totalMedia / count($medias);

        // Imprimir la tabla con los resultados
        echo "<h2>Boletín de notas</h2>";
        echo "<table>";
        echo "<tr><th>Asignatura</th><th>Trimestre 1</th><th>Trimestre 2</th><th>Trimestre 3</th><th>Media</th></tr>";

        foreach ($notas as $asignatura => $notasTrimestres) {
            echo "<tr>";
            echo "<td>$asignatura</td>";
            foreach ($notasTrimestres as $nota) {
                echo "<td>$nota</td>";
            }
            echo "<td>" . number_format($medias[$asignatura], 1) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<p>La media total es " . number_format($mediaTotal, 1) . "</p>";
    ?>

</body>
</html>