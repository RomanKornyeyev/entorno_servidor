<!-- Alex y Dani
Crea un array con 20 números aleatorios. A continuación, ordénalo, quítale la primera mitad de los números y pónselos al final.
Muestra todos los pasos por pantalla.

Tienes que usar las siguientes funciones

array_slice — Extract a slice of the array
array_push — Push one or more elements onto the end of array
sort — Sorts array in place by values in ascending order.4
rand — Generate a random integer
-->
<?php 

    function generarArray6($longitud){
        for ($i=0; $i < $longitud; $i++) { $arr[$i] = rand(1, 100); }
        
        return $arr;
    }

    //ARRAY ORIGINAL
    $array6 = generarArray6(20);

    //ORDENAR
    function ordenarArray6($array6){
        sort($array6, SORT_NUMERIC);
        return ($array6);
    }

    $arrayOrdenado6 = ordenarArray6($array6);

    //REHUBICACIÓN
    function reubicar6($arrayOrdenado6){
        $arrayCortado6 = array_slice($arrayOrdenado6, (count($arrayOrdenado6)/2));

        for ($i=0; $i < (count($arrayOrdenado6)/2); $i++) { 
            array_push($arrayCortado6, $arrayOrdenado6[$i]);
        }

        return $arrayCortado6;
    }

    $arrayReubicado = reubicar6($arrayOrdenado6);

?>