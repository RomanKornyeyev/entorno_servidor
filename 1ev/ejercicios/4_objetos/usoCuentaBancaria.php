<?php 

    require('CuentaBancaria.php');

    $a = new CuentaBancaria("Román", "10500");
    $b = new CuentaBancaria("Franco", "500");
    $c = new CuentaBancaria("Anabel", "100");
    
    print $a->mostrar();
    print $b->mostrar();
    print $c->mostrar();

?>