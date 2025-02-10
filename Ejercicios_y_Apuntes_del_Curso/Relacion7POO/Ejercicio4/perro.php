<?php

    class Perro{

        public $tamaño;
        public $raza;
        public $color;
        public $nombre;

       public function __construct($tamaño,$raza,$color,$nombre){


        
            $this->setnombre($nombre);
            $this-> tamaño = $tamaño;
            $this->raza = $raza;
            $this->color = $color;
            

            
        }

                /**
         * Get the value of tamaño
         */ 
        public function getTamaño()
        {
                return $this->tamaño;
        }

        /**
         * Set the value of tamaño
         *
         * @return  self
         */ 
        public function setTamaño($tamaño)
        {
                $this->tamaño = $tamaño;

                return $this;
        }

        /**
         * Get the value of raza
         */ 
        public function getRaza()
        {
                return $this->raza;
        }

        /**
         * Set the value of raza
         *
         * @return  self
         */ 
        public function setRaza($raza)
        {
                $this->raza = $raza;

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
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {

            if(strlen($nombre)<21 && is_string($nombre)){ //si es una cadena de caracteres y no excede de 21 caracteres
                $this->nombre = $nombre;
                return true;
            }else{
                throw new Exception("El nombre excede del maximo de caracteres");
                return false;
            }
                
        }

        function speak(){
            echo "Guau guau";
    
        }
       
    }

    

    function mostrar_propiedades(Perro $perro1){
        echo "El tamaño del perro es ". $perro1->tamaño . 
             ", su color es ". $perro1->color . 
             ", su raza es ". $perro1->raza . 
             ", y su nombre es ". $perro1->nombre;
    }
    
    $labrador = new Perro(10 , "labrador","blanco" , "tobi");

    mostrar_propiedades($labrador);

    $caniche = new Perro(3,"caniche","marron","pepe");

    
    

    

?>