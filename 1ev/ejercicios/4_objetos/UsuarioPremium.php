<?php 
    class UsuarioPremium extends Usuario{

        //constructor
        public function __construct($nombre, $apellidos, $deporte)
        {
            parent::__construct($nombre."(Premium)", $apellidos, $deporte);
        }

    }
?>