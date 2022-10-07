<!-- 
    Función: array_rand

    array_rand(array $array, int $num = 1): mixed
    array: El array de entrada.
    num: Especifica cuántas entradas deberían seleccionarse.

    Dados dos arrays unidimensionales, uno de tareas[] y otro de personas[], asigna de manera aleatoria una tarea a cada persona.

    ¿Qué ocurre si hay más tareas que minions? (un minio aleatorio deberé tener otra más)


    === Planificación semanal ===

    Si ya le echas valor, crea un arraybidimensional de tareas_diarias[dia][tarea] y haz un organigrama donde asignes tareas a cada persona durante la semana

    Cada día de las semana (de lunes a viernes) se tienen que hacer todas las tareas cada día y se tienen que distribuir entre los minions.

    Haz la distribución y pinta una tabla html.
-->
<?php
    $tareas = [
        'Pelar mandarinas',
        'Comer comida',
        'Beber bebida',
        'Recoger título',
        'Cobrar salario',
        'Barrer casa',
        'Fregar casa',
        // Añade más
    ];
    
    $minions = [
        'Oto',
        'Gah',
        'Bru',
        // Opcional
    ];

    function imprimirHorario7($tareas, $minions){
        $random_keys = array_rand($tareas, count($tareas));
        for ($i=0; $i < 7 ; $i++) { 
            echo "<div> DÍA ".($i+1)."<br><br>";
            for ($j=0; $j < count($tareas); $j++) {
                echo $tareas[$random_keys[$j]]." le corresponde a ".$minions[array_rand($minions, 1)]."<br>";
            }
            echo "</div>";
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/generales.css">
    <link rel="stylesheet" href="../css/10.clase.css">
    <title>Document</title>
</head>
<body>
    <div class="container limit-width-130">
        <header class="cabecera">
            <h2 class="title">Funciones: array_merge</h2>
        </header>

        <div class="container__main">
            <div class="central to-left-950 delay-450 grid-3 gap-4">
                <?=imprimirHorario7($tareas, $minions);?>
            </div>
        </div>

        <footer class="pie">
            <form class="width-100 limit-width-50" action="" method="post">
                <button class="button button--transparent up-750 delay-1150" type="submit" name="e0">Volver al inicio</button>
            </form>
        </footer>
    </div>
</body>
</html>