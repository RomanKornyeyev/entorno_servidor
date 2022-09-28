<?php 

function contarVocales($var) {
    $vocales = "aeiouAEIOU";
    $cont = 0;
    for($i=0; $i<mb_strlen($var); $i++){
        for($j=0; $j<mb_strlen($vocales); $j++){
            if($var[$i] == $vocales[$j]){
                $cont++;
                break;
            }
        }
    }

    return $cont;
}

function contarConsonantes($var) {
    $consonantes = 0;
    $consonantes = mb_strlen($var) - contarVocales($var);
    
    return $consonantes;
}

function esPalindromo($var) {
    $palindromo = true;

    for($i=0; $i<mb_strlen($var); $i++){
        if($var[mb_strlen($var)-1-$i] != $var[$i]){
            $palindromo = false;
        }
    }

    return $palindromo;
}

?>