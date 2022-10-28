<?php
    namespace Objetos;

    //clase EDIFICIO
    class Edificio
    {
        use \Comun\Posicion;
        use \Comun\Descripcion;

        private $altura;

        public function setAltura($altura){$this->altura = $altura;}
        public function getAltura(){return $this->altura;}
    }
?>