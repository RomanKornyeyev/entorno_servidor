<?php

    $nEjercicio = 0;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['e0'])) $nEjercicio = 0; //INICIO
        elseif (isset($_POST['e1'])) $nEjercicio = 1; //EJERCIO 1
        elseif (isset($_POST['e2'])) $nEjercicio = 2; //EJERCIO 1
        else $nEjercicio = 0; //INICIO
    }

    
    require('./funciones_php/funcionesGenerales.php'); //generales
    require('./funciones_php/10.1.clase.php'); //EJERCICIO 1
    require('./funciones_php/10.2.clase.php'); //EJERCICIO 2

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JS -->
    <link rel="prefetch" href="./js/scrollreveal-lib.js" as="script">
    <link rel="prefetch" href="./js/sr-10.1.clase.js" as="script">
    <link rel="preload" href="./js/scrollreveal-lib.js" as="script">
    <link rel="preload" href="./js/sr-10.1.clase.js" as="script">
    <script src="./js/scrollreveal-lib.js"></script>
    <script src="./js/sr-10.1.clase.js" defer></script>
    <!-- CSS -->
    <link rel="preload" href="./css/generales.css" as="styles">
    <link rel="preload" href="./css/10.clase.css" as="styles">
    <link rel="stylesheet" href="./css/generales.css">
    <link rel="stylesheet" href="./css/10.clase.css">
    <title>Clase</title>
</head>
<body>
    
    <!-- INICIO -->
    <?php if($nEjercicio == 0) { ?>
    <div class="container min-height-100vh">
        <header class="cabecera">
            <h2 class="title"><span class="typing">Ejercicios de compañeros</span></h2>
        </header>
        
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

        <footer class="pie">
            <form class="width-100 limit-width-50" action="./index.php">
                <button class="button button--transparent up-750 delay-1150" type="submit" name="e0">Volver al INDEX</button>
            </form>
        </footer>
    </div>
    <?php } ?>

    <!-- EJER 1 (JORGE) -->
    <?php if($nEjercicio == 1) { ?>
        <div class="container limit-width-120">
            <header class="cabecera limit-width-120">
                <h2 class="title">Funciones: array_walk, array_map, array_filter, array_reduce</h2>
            </header>

            <div class="container__main">
                <p class="central to-left-950 delay-450">
                    <strong>array_map:&nbsp;</strong>
                    <?= imprimirArray($listaSaludo) ?>
                </p>
                <p class="central to-left-950 delay-450">
                    <strong>array_reduce:&nbsp;</strong>
                    <?= imprimirVariable($listaCalorias) ?>
                </p>
                <p class="central to-left-950 delay-450">
                    <strong>array_filter (Hombres):&nbsp;</strong>
                    <?= walkearArray($listaHombres) ?>
                </p>
                <p class="central to-left-950 delay-450">
                    <strong>array_filter (Mujeres):&nbsp;</strong>
                    <?= walkearArray($listaMujeres) ?>
                </p>
            </div>

            <footer class="pie">
                <form class="width-100 limit-width-50" action="" method="post">
                    <button class="button button--transparent up-750 delay-1150" type="submit" name="e0">Volver al inicio</button>
                </form>
            </footer>
        </div>
    <?php }else if($nEjercicio == 2) { ?>
        <div class="container limit-width-120">
            <header class="cabecera limit-width-120">
                <h2 class="title">Funciones: array_intersect, array_search y array_replace</h2>
            </header>

            <div class="container__main">
                <p class="central to-left-950 delay-450">
                    <strong>Arrays:&nbsp;</strong>
                    <?= imprimirMatriz($arrays); ?>
                </p>
                <p class="central to-left-950 delay-450">
                    <strong>Posición:&nbsp;</strong>
                    <?= "¿En qué índice está el 13? - En el índice " . $busqueda; ?>
                </p>
            </div>

            <footer class="pie">
                <form class="width-100 limit-width-50" action="" method="post">
                    <button class="button button--transparent up-750 delay-1150" type="submit" name="e0">Volver al inicio</button>
                </form>
            </footer>
        </div>
    <?php } ?>
</body>
</html>