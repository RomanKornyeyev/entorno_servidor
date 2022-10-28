<?php
    //clase abstracta MAGO
    abstract class Mago implements Personaje
    {
        use Posicion;

        abstract public function ataque();
        public function defiende(){print "hechizo protector<br>";}
    }
?>