<?php 
    class Singleton
    {

        //en las clases en las que se use hay que poner un require();

        private $nombre;

        private static $config;

        public static function singleton()
        {
            if(!isset(self::$config)){
                self::$config = new Singleton();
            }
            return self::$config;
        }

        //ponemos un constructor privado para que no se pueda volver a instanciar
        private function __construct(){}

        public function setNombre($nombre){$this->nombre = $nombre;}
        public function getNombre(){return $this->nombre;}
        

    }
?>