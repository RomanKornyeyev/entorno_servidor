<?php 
    class Circulo{

        private $radio;
        private const PI = 3.14;

        public function setRadio($radio){$this->radio = $radio;}
        public function getRadio($radio){return $this->radio;}

        public function getArea(){return self::PI*pow($this->radio, 2);}

    }
?>