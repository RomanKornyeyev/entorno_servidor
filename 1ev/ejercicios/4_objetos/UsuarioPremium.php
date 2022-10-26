<?php 
    class UsuarioPremium extends Usuario{

        //constructor
        public function __construct($nombre, $apellidos, $deporte)
        {
            // $nombre .= " (Premium)";
            parent::__construct($nombre, $apellidos, $deporte);
        }

    }
?>