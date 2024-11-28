<link rel="stylesheet" href="../css/estilos.css">
<?php
include 'datos.php';

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['usuario']) && isset($_GET['pw'])) {
    $usuario = $_GET['usuario'];
    $pw = $_GET['pw'];
    try {
        if (login($usuario, $pw)) { //si es true entra
            escribeUsuario($usuario);
            escribePrestamos($usuario);
            listarLibrosDisponibles();

        } else { // si es false sale al else
            echo "Error: Usuario o pw incorrectos.";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else {
?>
    <form method="get" action="index.php">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>
        <label for="pw">pw:</label>
        <input type="password" id="pw" name="pw" required><br><br>
        <input type="submit" value="Iniciar sesión">
    </form>
<?php
}
?>