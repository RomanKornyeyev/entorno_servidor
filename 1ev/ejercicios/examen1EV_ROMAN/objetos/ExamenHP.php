<?php 

    class ExamenHP extends AExamen
    {
        public const NOTA_HP = random_int(4,5);

        //me da error si no pongo constructor
        public function __construct($nombre)
        {
            parent::intentar($nombre);
        }
        public function obtenerNota():int
        {
            return self::NOTA_HP;
        }
    }

?>