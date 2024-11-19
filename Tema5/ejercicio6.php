<?php
function validacion(){

    if($$_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = $POST['nombre'];
        $telefono = $POST['telefono'];
        $correo = $POST['correo'];
    }

    //validando el numero         
    if($$_SERVER["REQUEST_METHOD"] == "POST"){
        
        if(!empty($_POST["telefono"])){
            $phoneErr = "El telefono es obligatorio";
        }else{
            $telefono = $_POST["telefono"];
            if(!preg_match( "/^[0-9]{9}$/",$telefono)){
                $phoneErr = "<br><i>El teléfono debe contener exactamente 9 números.";
            }
        }
        
        
    }
}














?>

<form method="post">
    <label for="nombre">Nombre del Alumno:</label>
    <input type="text" id="nombre" name="nombre" required>
    <br>
    <label for="nota">Telefono:</label>
    <input type="number" id="telefono" name="telefono" step="0.1" required>
    <br>
    <label for="nota">Correo:</label>
    <input type="text" id="correo" name="correo" step="0.1" required>
    <br><br>
    <input type="submit" value="Añadir Alumno">
</form>