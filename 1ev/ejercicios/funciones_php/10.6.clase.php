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

    $array6 = [];

    function generarArray6($longitud){
        $arr = [];
        for ($i=0; $i < $longitud; $i++) { $arr[$i] = rand(1, 100); }
        
        return $arr;
    }

    //ARRAY ORIGINAL
    $array6 = generarArray6(20);

    //ORDENAR
    function ordenarArray6(){
        global $array6;
        sort($array6, SORT_NUMERIC);
        return ($array6);
    }

    //REHUBICACIÓN
    function reubicar6(){
        global $array6;
        $arrayCortado6 = array_slice($array6, (count($array6)/2));

        for ($i=0; $i < (count($array6)/2); $i++) { 
            array_push($arrayCortado6, $array6[$i]);
        }

        return $arrayCortado6;
    }

    $arrayReubicado = reubicar6();

?>