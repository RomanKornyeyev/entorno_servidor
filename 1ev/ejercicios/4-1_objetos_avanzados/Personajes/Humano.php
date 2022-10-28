<?php
    namespace Personajes;

    use \Comun\ComunPersonajes\Personaje;

    //clase HUMANO
    class Humano implements Personaje
    {
        use \Comun\Posicion;

        public function ataque(){print "puñetazo<br>";}
        public function defiende(){print "bloqueo<br>";}
    }
?>