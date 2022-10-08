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