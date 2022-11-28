<?php

    // === ARRAY_REDUCE ===
    //Reduce iterativamente un array a un solo valor usando una función llamada de retorno
    //Ej: suma todos los elementos de un array, convierte en string los elementos de un array, etc.

    $a = [1, 2, 3, 4, 5];

    //FUNCIÓN NORMAL
    function suma($aux, $elemento){
        $aux += $elemento;
        return $aux;
    }
    print_r(array_reduce($a, "suma")); // int(15)
    echo "<br>";



    //FUNCIÓN ANÓNIMA
    print_r(array_reduce($a, function($aux, $elemento){
        $aux += $elemento;
        return $aux;
    })); // int(15)
    echo "<br>";

    print_r(array_reduce($a, function($aux, $elemento){
        return $aux."-".$elemento;
    })); // int(15)
?>