<?php 

    class ExamenFacil extends AExamen
    {
        public const NOTA_FACIL = random_int(5,10);
        
        //me da error si no pongo constructor
        public function __construct($nombre)
        {
            parent::intentar($nombre);
        }
        public function obtenerNota():int
        {
            return self::NOTA_FACIL;
        }
    }

?>