<?php
    //clase OBJETO
    class Objeto
    {
        use Posicion;
        use Descripcion;

        private $peso;

        public function setPeso($peso){$this->peso = $peso;}
        public function getPeso(){return $this->peso;}
    }
?>