<?php 
    class Usuario{
        
        private $nombre;
        private $apellidos;
        private $deporte;
        private $nivel;
        private $contador; 

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
        public function setContador($contador){$this->contador = $contador;}
        public function getContador(){return $this->contador;} 

        //toString
        public function mostrar() {return "<b>Usuario:</b> ".$this->nombre." ".$this->apellidos.", deporte: ".$this->deporte.", nivel: ".$this->nivel;}

        //métodos
        public function introducirResultado(String $resultado){
            if(strcasecmp(strtolower($resultado), "victoria") == 0){
                $contador++;
                if($contador == self::$subirNivel){
                    if($nivel < 6){
                        $nivel++;
                        echo "Felicidades, has subido de nivel ($nivel)<br>";
                    }else echo "¡Has alcanzado el nivel máximo!<br>";
                }
            }else if(strcasecmp(strtolower($resultado), "derrota") == 0){
                $contador--;
                if($contador == self::$subirNivel){
                    if($nivel > 1){
                        $nivel--;
                        echo "Felicidades, has subido de nivel ($nivel)<br>";
                    }else echo "¡Has alcanzado el nivel máximo!<br>";
                }                
            }else if(strcasecmp(strtolower($resultado), "empate") == 0){
                $contador = 0;
            }else{
                echo "Introduce un valor válido <br>";
            }

        }

    }
?>