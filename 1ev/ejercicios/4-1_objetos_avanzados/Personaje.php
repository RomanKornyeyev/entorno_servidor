<?php 

    //interfaz PJ
    interface Personaje
    {
        public function ataque();
        public function defiende();
    }

    //clase HUMANO
    class Humano implements Personaje
    {
        public function ataque(){print "puñetazo<br>";}
        public function defiende(){print "bloqueo<br>";}
    }

    //clase abstracta MAGO
    abstract class Mago implements Personaje
    {
        abstract public function ataque();
        public function defiende(){print "hechizo protector<br>";}
    }

    //clase MAGOBLANCO
    class MagoBlanco extends Mago
    {
        public function ataque(){print "ataque de luz<br>";}
    }

    //clase MAGOOSCURO
    class MagoOscuro extends Mago
    {
        public function ataque(){print "ataque de sombra<br>";}
    }

    //clase EDIFICIO
    class Edificio
    {
        private $altura;

        public function setAltura($altura){$this->altura = $altura;}
        public function getAltura(){return $this->altura;}
    }

    //clase OBJETO
    class Objeto
    {
        private $peso;

        public function setPeso($peso){$this->peso = $peso;}
        public function getPeso(){return $this->peso;}
    }

    //trait DICEPOSICION
    trait DicePosicion
    {
        private $x;
        private $y;

        public function setX($x){$this->x = $x;}
        public function getX(){return $this->x;}
        public function setY($y){$this->y = $y;}
        public function getY(){return $this->y;}

        public function posicion(){
            
        }
    }



?>