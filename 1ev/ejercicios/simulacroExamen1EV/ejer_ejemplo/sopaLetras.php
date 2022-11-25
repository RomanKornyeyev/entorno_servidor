<?php
    $tablero = [];
    $n;
    $m;
    function inicializaSopaLetras(&$tablero, $n, $m){
        $letras = "abcdefghijklmnnopqrstuvwxyz";
        //$tablero = [];
        for ($i=0; $i < $n; $i++) { 
            for ($j=0; $j < $m; $j++) {
                $random = floor(rand(1, 27));
                $tablero[$i][$j] = substr($letras, $random, 1);
            }
        }
        //print_r($tablero);
    }

    inicializaSopaLetras($tablero, 5, 5);



    //apartado 2
    function pintaTablero($tablero){
        foreach ($tablero as $fila) {
            foreach ($fila as $columna) {
                echo $columna;
            }
        }
    }

    pintaTablero($tablero);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>