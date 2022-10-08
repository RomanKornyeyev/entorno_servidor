<?php

    function generarArray10($longitud){
        for ($i=0; $i < $longitud; $i++) { $arr[$i] = rand(1, 100); }
        
        return $arr;
    }

    //ARRAY ORIGINAL
    $array10 = generarArray10(20);
    print_r($array10);

    
    function filtrarImpares($input){return ($input & 1);}
    function filtrarPares($input){return !($input & 1);}

?>