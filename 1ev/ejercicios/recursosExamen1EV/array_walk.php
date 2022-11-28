<?php

    // === ARRAY_WALK ===
    //Aplicar una función proporcionada por el usuario a cada miembro de un array
    //Solo sirve para recorrer el array, no para hacer cambios (como el foreach en java)
    //Normalmente se usa para imprimir un array
    
    $usuarios = [
        "jorge" => "1234",
        "amparo" => "admin",
        "mary" => "jeje"
    ];

    //FUNCIÓN ANÓNIMA (MÁS LIVIANO)
    array_walk($usuarios, function ($valor, $llave) {
        echo "{$llave} => {$valor}<br>";
    });


    //FUNCIÓN NORMAL (MÁS ROLLO)
    array_walk($usuarios, "walkeo");
    function walkeo($valor, $llave) {
        echo "{$llave} => {$valor}<br>";
    }

?>