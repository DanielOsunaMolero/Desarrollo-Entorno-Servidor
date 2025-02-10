<html>

    <?php


        echo date('Y-m-d'); // Muestra la fecha actual en formato año-mes-día
        $tomorrow = strtotime('+1 week');
        echo date('</br> Y-m-d', $tomorrow); // Muestra la fecha de mañana
        
        // Fecha de hoy
        $hoy = date('Y-m-d');
        echo "Hoy: " . $hoy . "\n";

        // Fecha de ayer
        $ayer = date('Y-m-d', strtotime('-1 day'));
        echo "Ayer: " . $ayer . "\n";

        // Fecha de mañana
        $manana = date('Y-m-d', strtotime('+1 day'));
        echo "Mañana: " . $manana . "\n";



    ?>

</html>