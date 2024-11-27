<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    class Coche{
    
        public $color;
        public $marca;
        public $modelo;
        public $velocidad;
        public $caballos;
        public $plazas;


        public function __construct($color,$marca,$modelo,$velocidad,$caballos,$plazas){
        
            $this->color =  $color;
            $this->marca =  $marca;
            $this->modelo =  $modelo;
            $this->velocidad =  $velocidad;
            $this->caballos =  $caballos;
            $this->plazas =  $plazas;

        }


        /**
         * Get the value of velocidad
         */ 
        public function getVelocidad()
        {
                return $this->velocidad;
        }

        /**
         * Set the value of velocidad
         *
         * @return  self
         */ 
        public function setVelocidad($velocidad)
        {
                $this->velocidad = $velocidad;

                return $this;
        }

        /**
         * Get the value of caballos
         */ 
        public function getCaballos()
        {
                return $this->caballos;
        }

        /**
         * Set the value of caballos
         *
         * @return  self
         */ 
        public function setCaballos($caballos)
        {
                $this->caballos = $caballos;

                return $this;
        }

        /**
         * Get the value of plazas
         */ 
        public function getPlazas()
        {
                return $this->plazas;
        }

        /**
         * Set the value of plazas
         *
         * @return  self
         */ 
        public function setPlazas($plazas)
        {
                $this->plazas = $plazas;

                return $this;
        }

        /**
         * Get the value of color
         */ 
        public function getColor()
        {
                return $this->color;
        }

        /**
         * Set the value of color
         *
         * @return  self
         */ 
        public function setColor($color)
        {
                $this->color = $color;

                return $this;
        }

            /**
             * Get the value of marca
             */ 
            public function getMarca()
            {
                        return $this->marca;
            }

            /**
             * Set the value of marca
             *
             * @return  self
             */ 
            public function setMarca($marca)
            {
                        $this->marca = $marca;

                        return $this;
            }

        /**
         * Get the value of modelo
         */ 
        public function getModelo()
        {
                return $this->modelo;
        }

        /**
         * Set the value of modelo
         *
         * @return  self
         */ 
        public function setModelo($modelo)
        {
                $this->modelo = $modelo;

                return $this;
        }

        public function acelerar($velocidad){
            $velocidad = $velocidad+1;
        }
        public function frenar($velocidad){
            $velocidad = $velocidad-1;
        }
    }
    
    
    
    
    
    
    
    
    ?>
</body>
</html>