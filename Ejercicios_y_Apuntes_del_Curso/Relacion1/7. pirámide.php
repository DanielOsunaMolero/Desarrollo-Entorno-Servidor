<html>
<head>
    <title>Pirámide</title>
</head>
<body>
    <?php
    
        $niveles = 20;

        for ($i = 1; $i <= $niveles; $i++) {
            //  espacios en blanco 
            for ($j = $niveles - $i; $j > 0; $j--) {
                echo "&nbsp;&nbsp;";
            }
            
            //  asteriscos
            for ($k = 0; $k < (2 * $i - 1); $k++) {
                echo "*";
            }
            
            echo "<br>";
        }
    ?>
</body>
</html>
