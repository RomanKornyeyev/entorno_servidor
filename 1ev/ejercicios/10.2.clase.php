<!-- 
    2 Javi ඞ, Anabel ඞ y Román ඞ🔪

    Funciones: array_intersect, array_search y array_replace.

    Enunciado: Designa dos arrays con varios números. Algunos de ellos deberán coincidir entre ambas arrays.

    A continuación:

    Crea un tercer array que contenga los números en común de los primeros dos. Habrá posiciones nulas.
    Crea un cuarto array con las posiciones que le falten al anterior y un número asignado a cada una, y júntalo con el anterior.
    Busca el índice de un valor en el array final (por ejemplo el del valor 13)
    Finalmente, imprime todos los arrays que has generado para ver los cambios.

 -->
<?php
 
    $arrayReemplazo = [1=>20, 3=>7, 4=>13];

    $arrays = [
        $array1 = [1,2,13,4,15,6,7,18,9],
        $array2 = [1,12,13,14,5,6,7,18,19],
        $arrayFusionada = array_replace(array_intersect($array1,$array2), $arrayReemplazo)
    ];
    
    $busqueda = array_search(13, $arrayFusionada); //devolvería el 4 (el índice)
?>