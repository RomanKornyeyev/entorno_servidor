<?php 
    class Usuario{
        
        private $nombre;
        private $apellidos;
        private $deporte;
        private $nivel;
        private $contador;
        private $historial;

        private const MAX_DERR = 6;
        protected $max_ganar;

        //constructors
        public function __construct($nombre = "anónimo", $apellidos = "", $deporte = null, $max_ganar = 6)
        {
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->deporte = $deporte;
            $this->nivel = 0;
            $this->contador = 0;
            $this->historial = [];
            $this->max_ganar = $max_ganar;
            print "Usuario: ".$nombre." creado.<br>";
            
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
        public function setHistorial($historial){$this->historial = $historial;}
        public function getHistorial(){return $this->historial;}
        public function setMax_ganar($max_ganar){$this->max_ganar = $max_ganar;}
        public function getMax_ganar(){return $this->max_ganar;}

        
        //métodos
        public function introducirResultado(String $resultado){    
            if(strcasecmp(strtolower($resultado), "victoria") == 0){ //VICTORIA
                // reset contador si su última partida no fue ganada
                if(!empty($this->historial)){ if(strcasecmp($this->historial[count($this->historial)-1], "victoria") != 0){ $this->contador = 0; }}
                $this->contador++;
                array_push($this->historial, "victoria"); //añadimos el resultado al historial
                print $this->nombre." ".$tipo." gana partido.<br>"; //print de resultado
                if($this->contador == $this->max_ganar){ //si llegan a 6 o 3 victorias seguidas
                    if($this->nivel < 6){ //si el nivel es inferior al máximo
                        $this->nivel++;
                        print "$this->nombre ¡Felicidades, has subido de nivel (al $this->nivel)!<br>";
                    }else print "$this->nombre ¡Has alcanzado el nivel máximo, eres el puto amo!<br>";
                    $this->contador = 0; //reset
                }
            }else if(strcasecmp(strtolower($resultado), "derrota") == 0){ //DERROTA
                // reset contador si su última partida no fue perdida
                if(!empty($this->historial)){if(strcasecmp($this->historial[count($this->historial)-1], "derrota") != 0){ $this->contador = 0; }}
                $this->contador++;
                array_push($this->historial, "derrota"); //añadimos el resultado al historial
                print $this->nombre." ".$tipo." pierde partido.<br>"; //print del resultado
                if($this->contador == self::MAX_DERR){
                    $this->contador = 0; //reset
                    if($this->nivel > 0){ //si el nivel es superior al mínimo
                        $this->nivel--;
                        print "$this->nombre ¡Has bajado de nivel (al $this->nivel)! Eres un pringao.<br>";
                    }else print "$this->nombre ¡No puedes bajar de nivel, estás en el mínimo (0)!<br>";
                }                
            }else if(strcasecmp(strtolower($resultado), "empate") == 0){ //EMPATE
                $this->contador = 0; //reseteamos sí o sí
                array_push($this->historial, "empate");
                print $this->nombre." ".$tipo." empata partido.<br>";
            }else{
                print "Introduce un valor válido <br>";
            }
        }

        //toString
        public function mostrar() {
            print "<p class='azulito'>
            <b>Nombre:</b> ".$this->nombre."<br>".
            "<b>Apellidos:</b>".$this->apellidos." ".$tipo."<br>".
            "<b>Deporte:</b> ".$this->deporte."<br>".
            "<b>Nivel:</b> ".$this->nivel."<br>".
            "<b>Historial:</b>".$this->mostrarHistorial()."</p>";
            
        }
        public function mostrarHistorial(){
            $cadena = "";
            foreach ($this->historial as $valor) {
                $cadena .= "<li>$valor</li>";
            }

            return "<ul>$cadena</ul>";
        }
    }
?>