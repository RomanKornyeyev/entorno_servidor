<?php 

    abstract class AExamen implements IExamen
    {
        use \comun\TieneFecha;

        private $nombre;
        public function intentar($nombre){
            $this->nombre = $nombre;
        }
    }

?>