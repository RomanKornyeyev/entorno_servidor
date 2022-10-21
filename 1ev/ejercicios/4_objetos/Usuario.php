<?php 
    class Usuario{
        
        private $nombre;
        private $apellidos;
        private $deporte;
        private $nivel;

        private const subirNivel = 6;

        //constructors
        public function __construct($nombre = "anónimo", $apellidos = "", $deporte = null, $nivel = 0)
        {
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->deporte = $deporte;
            $this->nivel = $nivel;
        }

        //getters and setters
        public function setNombre($nombre){$this->nombre = $nombre;}
        public function getNombre(){return $this->nombre;}     
        public function setApellidos($apellidos){$this->apellidos = $apellidos;}
        public function getApellidos(){return $this->apellidos;}  
        public function setDeporte($deporte){$this->deporte = $deporte;}
        public function getDeporte(){return $this->deporte;}  
        public function setNivel($nivel){$this->nivel = $nivel;}
        public function getNivel(){return $this->nivel;}  

        //toString
        public function mostrar() {return "<b>Usuario:</b> ".$this->nombre." ".$this->apellidos.", deporte: ".$this->deporte.", nivel: ".$this->nivel;}

        //métodos
        public function introducirResultado(String $resultado){
            if(strcasecmp($resultado, "victoria") == 0){
                echo "funciona";
            }
        }

    }
?>