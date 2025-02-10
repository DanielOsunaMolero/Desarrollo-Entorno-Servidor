<html>
    <body>
    <form method="post" action="/index.php">
        <input type="submit" value="Menu">
    </form>
        <?php
            /*function compara($valor1,$valor2,$funcionComparacion):int{
                return $funcionComparacion($valor1,$valor2);
            }

            $comparaEnteros = function($valor1,$valor2):int {
                if($valor1 > $valor2)
                return 1;
                if($valor2 > $valor1)
                return -1;

            };
            $numero1 = 12;
            $numero2 = 40;

            if(compara($numero1,$numero2,$comparaEnteros)==-1){

                echo ("El numero 1 es mayor que el numero 2");
            }



           define("TITULO","Don quijote de la mancha");
           if(defined("TITULO")){
            echo " <br> El titulo es " . TITULO;
           }else{
            echo"El libro no esta definido";
           }*/ 
           //$listado_archivos = `dir`; // Listado de todos los archivos del directorio actual
           //echo "<pre>$listado_archivos<pre>"; // Se muestra en pantalla

           $variable = "Ana";
           echo'</br>';
           echo $variable ??  'No existe';

        class sesion
        {
            public $usuario;
            public function construct($usuario){
                $this->usuario = $usuario;
            }
        }
 
        class Usuario
        {
            public $nombre;
            private Estudios $estudios;

            public function getEstudios(): estudios
            {
                return $this->estudios;
            }
            public function construct($nombre,$estudios){
                $this->nombre = $nombre;
                $this->estudios = $estudios;
            }
        }

        class Estudios
        {

            public $universidad;
            public $titulo;

            public function construct($universidad,$titulo){
                $this->universidad = $universidad;
                $this->titulo = $titulo;
            }
        }
        
        $estudios = new Estudios("Salamanca", "Medicina");
        $usuario = new Usuario($estudios);
        $sesion = new sesion($usuario);

        $universidad = $sesion?-> usuario?->getEstudios()?->universidad;
        echo $universidad;
        ?>
    </body>
</html>