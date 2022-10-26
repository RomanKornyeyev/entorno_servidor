<?php 
    class UsuarioAdministrador extends Usuario{

        //constructor
        public function __construct($nombre, $apellidos, $deporte)
        {
            parent::__construct($nombre, $apellidos, $deporte);
        }

        //métodos
        public function crearPartido(){
            print "Partido creado.";
        }

    }
?>