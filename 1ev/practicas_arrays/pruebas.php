<?php

    $dwec = "Cliente";
    $dwes = "Servidor";
    $emp = "Empresa";
    $ing = "Inglés";
    $diw = "Interfaces";
    $daw = "Despliegue";
    

    $horario = [
        1 => ["16:00", $dwec, $ing, $diw, $emp, $dwes], 
        2 => ["16:55", $dwec, $daw, $diw, $daw, $dwes], 
        3 => ["17:50", $dwec, $daw, $diw, $daw, $dwes],
        4 => ["18:45", "P", "A", "T", "I", "O"],
        5 => ["19:10", $emp, $diw, $dwes, $dwes, $dwec],
        6 => ["16:00", $emp, $diw, $dwes, $dwes, $dwec],
        7 => ["16:00", $ing, $diw, $dwes, $dwes, $dwec],
    ];

    function generarHorario(){

        global $horario;

        for ($i = 1; $i < count($horario); $i++) {
            echo "<tr class='tr'>";
            for($j = 0; $j < count($horario[$i]); $j++){
                echo "<td class='td'>".$horario[$i][$j]."</td>";
            }
            echo "</tr>";
        }
    };

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilo_9.css">
    <script src="./js/scrollreveal-lib.js"></script>
    <script src="./js/scrollreveal.js" defer=""></script>
    <title>HORARIO</title>
</head>
<body>
    <div class="container">
        <div class="central">
            <table class="table">
                <tbody>
                    <?php generarHorario() ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>