<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<form method="POST" action="">
    <label for="fichero">Introduce un dia</label>
    <input type="string" id="fichero" name="fichero" required>
    <input type="submit" value="Enviar">
</form>
<body>
    <?php

        function string_calcula_extension($fichero){
            
            if(!empty($fichero)){
                $extension =  strstr($_POST['fichero'],'.');
            echo "<br> La extension del fichero es " . $extension;

            }
        }
        echo string_calcula_extension($_POST['fichero']);
    
    ?>
</body>
</html>