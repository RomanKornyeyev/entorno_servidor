<?php

    $nEjercicio = 0;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['e0'])) $nEjercicio = 0; //INICIO
        elseif (isset($_POST['e1'])) $nEjercicio = 1; //EJERCIO 1
        else $nEjercicio = 0; //INICIO
    }

    //=== FUNCIONES GENERALES ===
    function imprimirVariable($var){
        echo "<div class='lane up-1250'>".$var."</div>";
    }
    function imprimirArray($arr){
        for ($i = 0; $i < count($arr); $i++) {
            echo "<div class='lane up-1250'>".$arr[$i]."</div>";
        }
    }

    require('./10.1.clase.php'); //EJERCICIO 1

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="./css/generales.css">
    <link rel="stylesheet" href="./css/10.clase.css">
    <!-- JS -->
    <script src="./js/scrollreveal-lib.js"></script>
    <script src="./js/sr-10.1.clase.js" defer></script>
    <title>Clase</title>
</head>
<body>
    
    <!-- INICIO -->
    <?php if($nEjercicio == 0) { ?>
    <div class="container">
        <h2 class="title"><span class="typing">Ejercicios de compañeros</span></h2>
        <form class="formulario" action="" method="post">
            <button class="button to-left-750" type="submit" name="e1">Ejercicio 10.1</button>
            <button class="button to-left-750" type="submit" name="e2">Ejercicio 10.2</button>
            <button class="button to-left-750" type="submit" name="e3">Ejercicio 10.3</button>
            <button class="button to-left-750" type="submit" name="e4">Ejercicio 10.4</button>
            <button class="button to-left-750" type="submit" name="e5">Ejercicio 10.5</button>
            <button class="button to-left-750" type="submit" name="e6">Ejercicio 10.6</button>
            <button class="button to-left-750" type="submit" name="e7">Ejercicio 10.7</button>
            <button class="button to-left-750" type="submit" name="e8">Ejercicio 10.8</button>
            <button class="button to-left-750" type="submit" name="e9">Ejercicio 10.9</button>
            <button class="button to-left-750" type="submit" name="e10">Ejercicio 10.10</button>
            <button class="button to-left-750" type="submit" name="e11">Ejercicio 10.11</button>
            <button class="button to-left-750" type="submit" name="e12">Ejercicio 10.12</button>
        </form>
    </div>
    <?php } ?>

    <!-- EJER 1 (JORGE) -->
    <?php if($nEjercicio == 1) { ?>
        <div class="container">
            <div class="container__main">
                <div class="central">
                    <h2 class="title">array_map</h2>
                    <?= imprimirArray($listaSaludo) ?>
                </div>
                <div class="central">
                    <h2 class="title">array_reduce</h2>
                    <?= imprimirVariable($listaCalorias) ?>
                </div>
                <div class="central">
                    <h2 class="title">array_filter</h2>
                    <h3 class="sub-title up-1250">Hombres:</h3>
                    <?= walkearArray($listaHombres) ?>
                    <h3 class="sub-title up-1250">Mujeres:</h3>
                    <?= walkearArray($listaMujeres) ?>
                </div>
            </div>
            <footer class="pie">
                <form class="form-100-width" action="" method="post">
                    <button class="button to-left-750" type="submit" name="e0">Volver al inicio</button>
                </form>
            </footer>
        </div>
    <?php } ?>
</body>
</html>