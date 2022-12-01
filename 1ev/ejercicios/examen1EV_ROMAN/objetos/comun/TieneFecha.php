<?php

    namespace comun;

    trait TieneFecha
    {
        private $fecha;

        public function setFecha($fecha){$this->fecha = $fecha;}
        public function getFecha(){return $this->fecha;}
    }

?>