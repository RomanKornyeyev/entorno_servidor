<?php 

    class ExamenChungo extends AExamen
    {
        public const NOTA_CHUNGA = random_int(0,7);

        //me da error si no pongo constructor
        public function __construct($nombre)
        {
            parent::intentar($nombre);
        }
        public function obtenerNota():int
        {
            return self::NOTA_CHUNGA;
        }
    }

?>