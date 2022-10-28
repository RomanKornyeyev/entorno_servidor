<?php
    //clase HUMANO
    class Humano implements Personaje
    {
        use Posicion;

        public function ataque(){print "puñetazo<br>";}
        public function defiende(){print "bloqueo<br>";}
    }
?>