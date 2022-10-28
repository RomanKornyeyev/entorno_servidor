<?php 
    class UsuarioAdministrador extends Usuario{

        //constructor
        public function __construct($nombre, $apellidos, $deporte)
        {
            parent::__construct($nombre."(Admin)", $apellidos, $deporte, 3);
        }

        //métodos
        public function crearPartido(){
            print "Partido creado.";
        }

    }
?>