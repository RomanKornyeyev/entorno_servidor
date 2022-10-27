<?php 

    interface PlataformaPago
    {
        public function estableceConexion():bool;
        public function compruebaSeguridad():bool;
        public function pagar(String $cuenta, int $cantidad);
    }

    class BancoMalvado implements PlataformaPago
    {
        public function estableceConexion():bool
        {
            print "conexión BancoMalvado<br>";
            return true;
        }

        public function compruebaSeguridad():bool
        {
            print "conexión segura BancoMalvado<br>";
            return true;
        }

        public function pagar(String $cuenta, int $cantidad){
            print "Pago realizado BancoMalvado<br>";
        }
    }

    class BitCoinConan implements PlataformaPago
    {
        public function estableceConexion():bool
        {
            print "conexión BitCoinConan<br>";
            return true;
        }

        public function compruebaSeguridad():bool
        {
            print "conexión segura BitCoinConan<br>";
            return true;
        }

        public function pagar(String $cuenta, int $cantidad){
            print "Pago realizado BitCoinConan<br>";
        }
    }

    class BancoMaloMalisimo implements PlataformaPago
    {
        public function estableceConexion():bool
        {
            print "conexión BancoMaloMalisimo<br>";
            return true;
        }

        public function compruebaSeguridad():bool
        {
            print "conexión segura BancoMaloMalisimo<br>";
            return true;
        }

        public function pagar(String $cuenta, int $cantidad){
            print "Pago realizado BancoMaloMalisimo<br>";
        }
    }


   
    $numRand = mt_rand(1,3);
    $objetoRand;
    if($numRand == 1) $objetoRand = new BancoMalvado();
    if($numRand == 2) $objetoRand = new BitCoinConan();
    if($numRand == 3) $objetoRand = new BancoMaloMalisimo();

    $objetoRand->estableceConexion();
    $objetoRand->compruebaSeguridad();
    $objetoRand->pagar("12345", 500);

    

?>