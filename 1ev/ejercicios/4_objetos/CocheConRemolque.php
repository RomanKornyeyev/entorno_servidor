<?php 
    class CocheConRemolque extends Coche{

        private $capacidadRemolque;

        //constructores
        public function __construct($matricula = "", $marca = "", $carga = 0, $capacidadRemolque = 0)
        {
            parent::__construct($matricula, $marca, $carga);
            $this->capacidadRemolque = $capacidadRemolque;
        }

        //getters and setters
        public function setCapacidadRemolque($capacidadremolque){$this->capacidadremolque = $capacidadremolque;}
        public function getCapacidadRemolque(){return $this->capacidadremolque;}

        //toString
        public function mostrar() {return parent::mostrar()." y remolque de: ".$this->capacidadRemolque;}

    }
?>