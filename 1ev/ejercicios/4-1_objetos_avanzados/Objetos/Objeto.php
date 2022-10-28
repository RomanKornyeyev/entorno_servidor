<?php
    namespace Objetos;

    //clase OBJETO
    class Objeto
    {
        use \Comun\Posicion;
        use \Comun\Descripcion;

        private $peso;

        public function setPeso($peso){$this->peso = $peso;}
        public function getPeso(){return $this->peso;}
    }
?>