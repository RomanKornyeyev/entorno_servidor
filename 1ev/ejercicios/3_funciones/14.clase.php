<?php 
    $cosas = [
        3,
        "frutas"  => ["a" => "naranja", "b" => [1, 2], "c" => "manzana"],
        "números" => [1, 2, 3, 4, 5, 6],
        "hoyos"   => ["primero", 5 => "segundo", "tercero"],
        "asd"
    ];

    function imprimeTabulado($cosas, $tab = 0) {
        $aux = '';
        for($i = 0; $i < $tab; $i++) 
            $aux .= '_';

        foreach ($cosas as $key => $value) {
            if (is_array($value)) {
                echo $aux.gettype($value)."<br>";
                imprimeTabulado($value, ($tab + 4));
            } else {
                echo  $aux.$value."<br>";
            }
        }
    }

    function invertirCadena($cadena, $index = 0) {
        if (!empty($cadena[$index])) {
            invertirCadena($cadena, $index + 1);
        }
        echo $cadena[$index];
    }
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="./css/generales.css">
    <link rel="stylesheet" href="./css/11.clase.css">
    <title>14 Clase</title>
</head>
<body>
    <div class="container limit-width-120">
        <!-- ej  -->
        <header class="cabecera">
            <p class="title-description">
                14. [25 min] Crea una función para imprimir array, también debe contemplar que los elementos pueden ser arrays. Deberá identar la salida acorde a la estructura de arrays Ejemplo:
            </p>
        </header>
        <div class="container__main">
            <div class="central">
                <?= imprimeTabulado($cosas) ?>
            </div>
            <div class="central">
                <?= invertirCadena("hola") ?>
            </div>            
        </div>
    </div>
</body>
</html>