<?php 

    // === ARRAY_FILTER ===
    // Filtra elementos de un array usando una función de devolución de llamada

    $personas = [
        ['Jorge', 1],
        ['Bea', 0],
        ['Paco', 1],
        ['Amparo', 0],
    ];

    //Con el array de personas anterior, utiliza el array_filter para sacar un listado de Hombre y otro listado de mujeres.
    function hombres($var){ //filtramos hombres
        return ($var[1] == 1);
    };
    function mujeres($var){ //filtramos mujeres
        return !($var[1] == 1);
    };
    //volcamos los resultados en 2 arrays
    $listaHombres = array_filter($personas, "hombres");
    $listaMujeres = array_filter($personas, "mujeres");

    

    // OTRO EJEMPLO, PARES E IMPARES
    // Función: array_filter En una lista de digitos del 1 al 20, filtrar y mostrar las posiciones de los números pares e impares.
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