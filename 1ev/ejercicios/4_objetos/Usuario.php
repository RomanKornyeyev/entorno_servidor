<?php 
    class Usuario{
        
        private $nombre;
        private $apellidos;
        private $deporte;
        private $nivel;
        private $contador;
        private $historial;

        private const subirNivel = 6;

        //constructors
        public function __construct($nombre = "anónimo", $apellidos = "", $deporte = null)
        {
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->deporte = $deporte;
            $this->nivel = 1;
            $this->contador = 0;
            $this->historial = [];
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

        //toString
        public function mostrar() {
            print "<p class='azulito'>
            <b>Usuario:</b> ".$this->nombre." ".$this->apellidos."<br>".
            "<b>Deporte:</b> ".$this->deporte."<br>".
            "<b>Nivel:</b> ".$this->nivel."</p>";
            $this->mostrarHistorial();
        }
        public function mostrarHistorial(){
            print "Historial:<br><ul>";
            array_walk($this->historial, function($value, $key){
                print "<li>".$value."</li>";
            });
            print "</ul>";
        }

        //métodos
        public function introducirResultado(String $resultado){
            if(strcasecmp(strtolower($resultado), "victoria") == 0){
                if(!empty($this->historial)){
                    if($this->historial[count($this->historial)]){
                        
                    }
                }
                $this->contador++;
                array_push($this->historial, "victoria");
                if($this->contador == self::subirNivel){
                    $this->contador = 0; //reset
                    if($this->nivel < 6){
                        $this->nivel++;
                        print "Felicidades, has subido de nivel (al $this->nivel)<br>";
                    }else print "¡Has alcanzado el nivel máximo!<br>";
                }
            }else if(strcasecmp(strtolower($resultado), "derrota") == 0){
                //$this->contador = 0;
                $this->contador++;
                array_push($this->historial, "derrota");
                if($this->contador == self::subirNivel){
                    $this->contador = 0; //reset
                    if($this->nivel > 1){
                        $this->nivel--;
                        print "Felicidades, has subido de nivel ($this->nivel)<br>";
                    }else print "¡No puedes bajar de nivel, estás en el mínimo (1)!<br>";
                }                
            }else if(strcasecmp(strtolower($resultado), "empate") == 0){
                $this->contador = 0;
                array_push($this->historial, "empate");
            }else{
                print "Introduce un valor válido <br>";
            }
        }
    }
?>