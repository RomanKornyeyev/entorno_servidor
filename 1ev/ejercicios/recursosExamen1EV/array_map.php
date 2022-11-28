<?php

    // === ARRAY_WALK ===
    // Aplica la retrollamada a los elementos de los arrays dados
    // Como array_walk, pero devolviendo un array con valores modificados

    $a=array(1,2,3,4,5);
    
    //FUNCIÓN NORMAL
    function cuadrado($valor){
        return($valor*$valor);
    }    
    print_r(array_map("cuadrado",$a));


    //FUNCIÓN ANÓNIMA (MEJOR)
    print_r(array_map(function($valor){
        return($valor*$valor);
    }, $a));

?>