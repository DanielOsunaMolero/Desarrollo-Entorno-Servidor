<?php
// Función para crear el array de alumnos
function creararrayalumnos(){
    return [
        "Marta" => 7.8,
        "Luis" => 5.0,
        "Lorena" => 6.9,
        "Pablo" => 8.2
    ];
};



$alumnos = creararrayalumnos();

mostrarArrayordenado($alumnos);

function addalumnos($alumnos,$nombre , $nota){
    if(array_key_exists($nombre , $alumnos)){
        echo "<p>El alumno '$nombre' ya existe. Su nota ha sido actualizada.</p>";
    }else{
        echo "<p>El alumno ha sido añadido</p>";
        
    }
    $arrayalumnos[$nombre]= $nota;

}
function mostrarArrayordenado($alumnos){
    // Ordenar el array por clave (nombre del alumno)
    ksort($alumnos);
    echo "<table border='1'>";
    echo "<tr><th>Alumno</th><th>Nota</th></tr>";
    foreach ($alumnos as $nombre => $nota) {
        echo "<tr><td>$nombre</td><td>$nota</td></tr>";
    }
    $media = calcularMedia($alumnos);
    echo "<tr><td colspan='2'><strong>Media:</strong> $media</td></tr>";
    echo "</table>";
}

function calcularMedia($alumnos) {
    return array_sum($alumnos) / count($alumnos);
}
// Manejar formulario para agregar alumnos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $nota = (float)$_POST['nota'];
    addalumnos($alumnos, $nombre, $nota);
    // Mostrar el array actualizado
    mostrarArrayordenado($alumnos);
    print_r($alumnos);
}
?>
<!-- Formulario HTML para añadir alumnos -->
<form method="post">
    <label for="nombre">Nombre del Alumno:</label>
    <input type="text" id="nombre" name="nombre" required>
    <br>
    <label for="nota">Nota:</label>
    <input type="number" id="nota" name="nota" step="0.1" required>
    <br><br>
    <input type="submit" value="Añadir Alumno">
</form>