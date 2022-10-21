<?php 
    class CocheGrua extends Coche{

        private $cocheCargado;

        //constructores
        public function __construct($matricula = "", $marca = "", $carga = 0, $cocheCargado = "")
        {
            parent::__construct($matricula, $marca, $carga);
            $this->cocheCargado = $cocheCargado;
        }

        //getters and setters
        public function setCocheCargado($cocheCargado){$this->cocheCargado = $cocheCargado;}
        public function getCocheCargado(){return $this->cocheCargado;}

        //toString
        public function mostrar() {
            $aux = "";
            ($this->cocheCargado == null)? $aux="ninguno" : $aux = $this->cocheCargado->mostrar();
            return parent::mostrar()."<br>
            Lleva Coche: ".$aux;
        }

        //métodos
        public function cargar($coche){
            $this->cocheCargado = $coche;
        }
        public function descargar($coche){
            $this->cocheCargado = null;
        }

    }
?>