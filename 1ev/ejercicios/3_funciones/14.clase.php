<?php 
    $cosas = [
        3,
        "frutas"  => ["a" => "naranja", "b" => [1, 2], "c" => "manzana"],
        "números" => [1, 2, 3, 4, 5, 6],
        "hoyos"   => ["primero", 5 => "segundo", "tercero"],
        "asd"
    ];

    function imprimeTabulado($cosas){
        foreach ($variable as $value) {
            while (gettype($value) == 'array') {
                array_walk($value, function($item, $key){
                    echo "$key. $item";
                });
            }
        }
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
                PHP AQUI
            </div>            
        </div>
    </div>
</body>
</html>