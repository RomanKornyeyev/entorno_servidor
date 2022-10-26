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
            $this->nivel = 0;
            $this->contador = 0;
            $this->historial = [];
            if(get_class($this) == "Usuario") print "Usuario: ".$nombre." creado.<br>";
            else if(get_class($this) == "UsuarioPremium") print "Usuario: ".$nombre." (Premium) creado.<br>";
            else if(get_class($this) == "UsuarioAdministrador") print "Usuario: ".$nombre." (Admin) creado.<br>";
            
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

        
        //métodos
        public function introducirResultado(String $resultado){
            //tipo de usuario
            $tipo = "";
            //si es un usuario normal sube cada 6 partidas
            $auxSubida = self::subirNivel;
            //si es premium sube cada 3 y añade (PREMIUM) al nombre
            if(get_class($this) == "UsuarioPremium"){
                $auxSubida = self::subirNivel / 2;
                $tipo = "(Premium)";
            }else if(get_class($this) == "UsuarioAdministrador"){ //idem, pero con admin
                $auxSubida = self::subirNivel / 2;
                $tipo = "(Admin)";
            }
            
            if(strcasecmp(strtolower($resultado), "victoria") == 0){ //si ganan
                if(!empty($this->historial)){
                    if(strcasecmp($this->historial[count($this->historial)-1], "victoria") != 0){
                        $this->contador = 0; // reset contador si su última partida no fue ganada
                    }
                }
                $this->contador++;
                array_push($this->historial, "victoria"); //añadimos el resultado al historial
                print $this->nombre." ".$tipo." gana partido.<br>"; //print de resultado
                if($this->contador == $auxSubida){ //si llegan a 6 o 3 victorias seguidas
                    if($this->nivel < 6){ //si el nivel es inferior al máximo
                        $this->nivel++;
                        print "$this->nombre ¡Felicidades, has subido de nivel (al $this->nivel)!<br>";
                    }else print "$this->nombre ¡Has alcanzado el nivel máximo, eres el puto amo!<br>";
                    $this->contador = 0; //reset
                }
            }else if(strcasecmp(strtolower($resultado), "derrota") == 0){ //si pierden
                if(!empty($this->historial)){
                    if(strcasecmp($this->historial[count($this->historial)-1], "derrota") != 0){
                        $this->contador = 0; // reset contador si su última partida no fue perdida
                    }
                }
                $this->contador++;
                array_push($this->historial, "derrota"); //añadimos el resultado al historial
                print $this->nombre." ".$tipo." pierde partido.<br>"; //print del resultado
                if($this->contador == self::subirNivel){
                    $this->contador = 0; //reset
                    if($this->nivel > 0){ //si el nivel es superior al mínimo
                        $this->nivel--;
                        print "$this->nombre ¡Has bajado de nivel (al $this->nivel)! Eres un pringao.<br>";
                    }else print "$this->nombre ¡No puedes bajar de nivel, estás en el mínimo (0)!<br>";
                }                
            }else if(strcasecmp(strtolower($resultado), "empate") == 0){ //si empatan
                $this->contador = 0;
                array_push($this->historial, "empate");
                print $this->nombre." ".$tipo." empata partido.<br>";
            }else{
                print "Introduce un valor válido <br>";
            }
        }

        //toString
        public function mostrar() {
            $tipo = "";
            if(get_class($this) == "UsuarioPremium") $tipo = "(Premium)";
            else if (get_class($this) == "UsuarioAdministrador") $tipo = "(Admin)";
            print "<p class='azulito'>
            <b>Usuario:</b> ".$this->nombre." ".$this->apellidos." ".$tipo."<br>".
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
    }
?>