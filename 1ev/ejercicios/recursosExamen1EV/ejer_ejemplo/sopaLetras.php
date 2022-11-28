<?php
    $tablero = [];
    $n;
    $m;
    function inicializaSopaLetras(&$tablero, $n, $m){
        $letras = "abcdefghijklmnnopqrstuvwxyz";
        for ($i=0; $i < $n; $i++) { 
            for ($j=0; $j < $m; $j++) {
                $random = random_int(0, 26);
                $tablero[$i][$j] = substr($letras, $random, 1);
            }
        }
    }

    inicializaSopaLetras($tablero, 8, 8);

    //apartado 2
    function pintaTablero($tablero){
        echo "<table>";
        foreach ($tablero as $fila) {
            echo "<tr>";
            foreach ($fila as $valor) {
                echo "<td>".$valor."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    //apartado 3
    function colocaPalabraHorizontal(&$tablero, $palabra){

        //cogemos la long de palabra
        $longPalabra = strlen($palabra);

        //restamos el ancho del tablero con la longitud de palabra (porque va en horizontal)
        //es decir, si el tablero mide 15 y la palabra 5, MÁXIMO se podrá poner en la posición 10 (contando desde izq a der)
        $maxX = count($tablero) - $longPalabra;
        //lo mismo para el eje vertical, pero en este caso como la palabra es horizontal, símplemente hacemos el count
        //de $tablero[0] (la primera fila que siempre va a estar)
        $maxY = count($tablero[0]);

        //posiciones donde se introducirá la palabra
        $inicialX = rand(0, $maxX);
        $inicialY = rand(0, $maxY - 1);

        //insertamos la palabra en el tablero
        for ($i=0; $i < $longPalabra; $i++) { 
            $tablero[$inicialY][$inicialX + $i] = substr($palabra, $i, 1);
        }

    }

    function colocaPalabraVertical(&$tablero, $palabra){

        //cogemos la long de palabra
        $longPalabra = strlen($palabra);

        //limites
        $maxX = count($tablero);
        $maxY = count($tablero[0]) - $longPalabra;

        //posiciones donde se introducirá la palabra
        $inicialX = rand(0, $maxX - 1);
        $inicialY = rand(0, $maxY);

        //insertamos la palabra en el tablero
        for ($i=0; $i < $longPalabra; $i++) { 
            $tablero[$inicialY + $i][$inicialX] = substr($palabra, $i, 1);
        }

    }

    function colocaPalabraHorizontalAlreves(&$tablero, $palabra){

        //cogemos la long de palabra
        $longPalabra = strlen($palabra);

        //limites
        $maxX = count($tablero) - $longPalabra;
        $maxY = count($tablero[0]);

        //posiciones donde se introducirá la palabra
        $inicialX = rand(0, $maxX);
        $inicialY = rand(0, $maxY - 1);

        //insertamos la palabra en el tablero
        for ($i=0; $i < $longPalabra; $i++) { 
            $tablero[$inicialY][$inicialX + $i] = substr($palabra, $longPalabra-$i-1, 1);
        }

    }

    function colocaPalabraVerticalAlreves(&$tablero, $palabra){

        //cogemos la long de palabra
        $longPalabra = strlen($palabra);

        //limites
        $maxX = count($tablero);
        $maxY = count($tablero[0]) - $longPalabra;

        //posiciones donde se introducirá la palabra
        $inicialX = rand(0, $maxX - 1);
        $inicialY = rand(0, $maxY);

        //insertamos la palabra en el tablero
        for ($i=0; $i < $longPalabra; $i++) { 
            $tablero[$inicialY + $i][$inicialX] = substr($palabra, $longPalabra-$i-1, 1);
        }

    }

    function colocaPalabra(&$tablero, $palabra){
        $random = random_int(1,4);

        switch ($random) {
            case 1: colocaPalabraHorizontal($tablero, $palabra); break;
            case 2: colocaPalabraVertical($tablero, $palabra); break;
            case 3: colocaPalabraHorizontalAlreves($tablero, $palabra); break;
            case 4: colocaPalabraVerticalAlreves($tablero, $palabra); break;
            
            default: echo "error"; break;
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{box-sizing: border-box;}
        table, tr, td{
            border: 1px solid black;
            border-collapse: collapse;
        }
        td{
            padding: 5px 7.5px;
        }
    </style>
</head>
<body>
    <?php
        colocaPalabra($tablero, "HOLA");
        pintaTablero($tablero);
    ?>
</body>
</html>