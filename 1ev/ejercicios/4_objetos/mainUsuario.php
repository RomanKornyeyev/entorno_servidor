<?php

    require('Usuario.php');

    $a = new Usuario();

    print $a->mostrar();
    echo "<br>";
    
    $a->introducirResultado("victorIA");
    

?>