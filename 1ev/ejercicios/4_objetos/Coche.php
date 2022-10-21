<?php 
    class Coche{

        private $matricula;
        private $marca;
        private $carga;

        //constructors
        public function __construct($matricula = "", $marca = "", $carga = 0)
        {
            $this->matricula = $matricula;
            $this->marca = $marca;
            $this->carga = $carga;
        }

        //getters and setters
        public function setMatricula($matricula){$this->matricula = $matricula;}
        public function getMatricula(){return $this->matricula;}
        public function setMarca($marca){$this->marca = $marca;}
        public function getMarca(){return $this->marca;}
        public function setCarga($carga){$this->carga = $carga;}
        public function getCarga(){return $this->carga;}

        
        //funciones
        
        

        //toString
        public function mostrar() {return "<b>Coche:</b> matrícula: ".$this->matricula.", marca: ".$this->marca." con carga: ".$this->carga;}

    }
?>