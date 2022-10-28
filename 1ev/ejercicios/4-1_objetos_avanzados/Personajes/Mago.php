<?php
    namespace Personajes;
    use \Comun\ComunPersonajes\Personaje;

    //clase abstracta MAGO
    abstract class Mago implements Personaje
    {
        use \Comun\Posicion;

        abstract public function ataque();
        public function defiende(){print "hechizo protector<br>";}
    }
?>