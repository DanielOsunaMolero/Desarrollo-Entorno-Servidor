<html>

<form method="POST" action="">
    <label for="euros">Introduce un número:</label>
    <input type="number" id="euros" name="euros" required>
    <input type="submit" value="Enviar">
</form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
        $euros = $_POST["euros"];

        $dolares =  $euros * 1.1;
        echo "Son : ". $dolares . " dolares ";
    }
        
    ?>
</html>