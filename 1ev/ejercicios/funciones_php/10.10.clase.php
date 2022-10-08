<!-- 

    Función: array_filter En una lista de digitos del 1 al 20, filtrar y mostrar las posiciones de los números pares e impares.

 -->
<?php

    function generarArray10($longitud){
        for ($i=0; $i < $longitud; $i++) { $arr[$i] = rand(1, 100); }
        
        return $arr;
    }

    //ARRAY ORIGINAL
    $array10 = generarArray10(20);

    //FILTRO
    function filtrarPares($input){return ($input %2 == 0);}
    function filtrarImpares($input){return ($input % 2 != 0);}
    $impares10 = array_filter($array10, "filtrarImpares");     
    $pares10 = array_filter($array10, "filtrarPares");

    //RE-INDEXADO
    $impares10 = array_values($impares10);
    $pares10 = array_values($pares10);

?>