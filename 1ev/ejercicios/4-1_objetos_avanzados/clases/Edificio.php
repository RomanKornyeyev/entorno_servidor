<?php
    //clase EDIFICIO
    class Edificio
    {
        use Posicion;
        use Descripcion;

        private $altura;

        public function setAltura($altura){$this->altura = $altura;}
        public function getAltura(){return $this->altura;}
    }
?>