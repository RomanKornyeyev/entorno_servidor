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
        $arr = [];
        for ($i=0; $i < $longitud; $i++) { $arr[$i] = rand(1, 100); }
        
        return $arr;
    }

    //ARRAY ORIGINAL
    $array6 = generarArray6(20);

    //ORDENAR
    function ordenarArray6($array6){
        sort($array6, SORT_NUMERIC);
    }

    //REHUBICACIÓN
    function reubicar6($array6){
        $arrayAux6 = array_slice($array6, (count($array6)/2));
        for ($i=0; $i < count($array6); $i++) { 
            array_push($arrayAux6, $array6[$i]);
        }

        return $arrayAux6;
    }

    $arrayAux6 = reubicar6($array6);


?>