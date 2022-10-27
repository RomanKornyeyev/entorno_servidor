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
        use Posicion;

        public function ataque(){print "puñetazo<br>";}
        public function defiende(){print "bloqueo<br>";}
    }

    //clase abstracta MAGO
    abstract class Mago implements Personaje
    {
        use Posicion;

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
        use Posicion;
        use Descripcion;

        private $altura;

        public function setAltura($altura){$this->altura = $altura;}
        public function getAltura(){return $this->altura;}
    }

    //clase OBJETO
    class Objeto
    {
        use Posicion;
        use Descripcion;

        private $peso;

        public function setPeso($peso){$this->peso = $peso;}
        public function getPeso(){return $this->peso;}
    }

    //trait DESCRIPCION
    trait Descripcion
    {
        private $descripcion;

        public function setDescripcion($descripcion){$this->descripcion = $descripcion;}
        public function getDescripcion(){return $this->descripcion;}
    }

    //trait DICEPOSICION
    trait Posicion
    {
        private $x;
        private $y;

        public function setX($x){$this->x = $x;}
        public function getX(){return $this->x;}
        public function setY($y){$this->y = $y;}
        public function getY(){return $this->y;}
    }

    // ======== TESTEOS ==========
    //Personaje HUMANO
    print "<div class='caja'>";
    print "<h2>PJ HUMANO:</h2>";
    $humano1 = new Humano();
    $humano1->ataque();
    $humano1->defiende();
    //trait POSICION
    $humano1->setX(50);
    $humano1->setY(95);
    print "Posición X: ".$humano1->getX().", Posición Y: ".$humano1->getY()."<br>";
    print "</div>";


    //Personaje MAGO BLANCO
    print "<div class='caja'>";
    print "<h2>PJ MAGO BLANCO:</h2>";
    $magoB1 = new MagoBlanco();
    $magoB1->ataque();
    $magoB1->defiende();
    //trait POSICION
    $magoB1->setX(55);
    $magoB1->setY(90);
    print "Posición X: ".$magoB1->getX().", Posición Y: ".$magoB1->getY()."<br>";
    print "</div>";

    //Personaje MAGO OSCURO
    print "<div class='caja'>";
    print "<h2>PJ MAGO OSCURO:</h2>";
    $magoOs1 = new MagoOscuro();
    $magoOs1->ataque();
    $magoOs1->defiende();
    //trait POSICION
    $magoOs1->setX(55);
    $magoOs1->setY(90);
    print "Posición X: ".$magoOs1->getX().", Posición Y: ".$magoOs1->getY()."<br>";
    print "</div>";


    //clase EDIFICIO
    print "<div class='caja'>";
    print "<h2>EDIFICIO:</h2>";
    $edificio1 = new Edificio();
    $edificio1->setAltura(150);
    print "Altura: ".$edificio1->getAltura()."<br>";
    //trait POSICION
    $edificio1->setX(55);
    $edificio1->setY(90);
    print "Posición X: ".$edificio1->getX().", Posición Y: ".$edificio1->getY()."<br>";
    //trait DESCRIPCION
    $edificio1->setDescripcion("Es un edificio muy bonico");
    print "Descripción: ".$edificio1->getDescripcion()."<br>";
    print "</div>";


    //clase OBJETO
    print "<div class='caja'>";
    print "<h2>OBJETO:</h2>";
    $objeto1 = new Objeto();
    $objeto1->setPeso(20);
    print "Peso: ".$objeto1->getPeso()."<br>";
    //trait POSICION
    $objeto1->setX(55);
    $objeto1->setY(90);
    print "Posición X: ".$objeto1->getX().", Posición Y: ".$objeto1->getY()."<br>";
    //trait DESCRIPCION
    $objeto1->setDescripcion("Es una mochila con 15 libros dentro");
    print "Descripción: ".$objeto1->getDescripcion()."<br>";
    print "</div>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *,*::before,*::after{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            padding: 25px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            background-color: lightgray;
        }
        .caja{
            background-color: white;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    
</body>
</html>