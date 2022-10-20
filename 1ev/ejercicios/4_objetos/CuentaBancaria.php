<?php 
    class CuentaBancaria{

        private static $contCuentas = 1001;

        private $numeroCuenta;
        private $nombre;
        private $saldo;

        //constructors
        public function __construct($nombre = "anónimo", $saldo = 0)
        {
            $this->numeroCuenta = self::$contCuentas++;
            $this->nombre = $nombre;
            $this->saldo = $saldo;
        }

        //getters and setters
        public function getNumeroCuenta(){return $this->$numeroCuenta;}
        public function setNombre($nombre){$this->nombre = $nombre;}
        public function getNombre(){return $this->nombre;}
        public function setSaldo($saldo){$this->saldo = $saldo;}
        public function getSaldo(){return $this->saldo;}

        
        //funciones
        public function ingresar(float $cantidad){$this->saldo += $cantidad;}
        public function retirar(float $cantidad){$this->saldo -= $cantidad;}
        public function saldo():float
        {
            return $this->saldo;
        }
        public function transferirA($CuentaBancaria, $cantidad){
            
        }

        //toString
        public function mostrar() {return "Nombre: ".$this->nombre." Nº Cuenta: ".$this->numeroCuenta." Saldo: ".$this->saldo;}

    }
?>