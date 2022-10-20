<?php 

    require('CuentaBancaria.php');

    $a = new CuentaBancaria("Román", "1000");
    $b = new CuentaBancaria("Franco", "1000");
    $c = new CuentaBancaria("Anabel", "1000");
    $d = new CuentaBancaria("Javi", "1000");

    echo "<p>OBJETOS:</p>";
    print $a->mostrar();echo "<br>";
    print $b->mostrar();echo "<br>";
    print $c->mostrar();echo "<br>";
    print $d->mostrar();echo "<br>";echo "<br>";

    echo "<p>ROMAN TRANSIERE A FRANCO:</p>";
    $a->transferirA($b, 500);echo "<br>";
    print $a->mostrar();echo "<br>";
    print $b->mostrar();echo "<br>";echo "<br>";
    
    echo "<p>UNIR ANABEL CON JAVI:</p>";
    $c->unirCon($d);echo "<br>";
    print $c->mostrar();echo "<br>";
    print $d->mostrar();echo "<br>";

?>